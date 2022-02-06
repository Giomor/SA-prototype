<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecommendationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function recommendMuseums(Request $request) {

       // $user = Auth::user();
        //TODO: replace this position with the position of the full museum
        $latitude = 42.36151025704874;
        $longitude = 13.418139001576291;
        //Haversine formula to calculate distance between two points
        $sqlDistance = DB::raw('( 6371 * acos( cos( radians(' . $latitude . ') )
                       * cos( radians( heritage_site.latitude ) )
                       * cos( radians( heritage_site.longitude )
                       - radians(' . $longitude  . ') )
                       + sin( radians(' . $latitude  . ') )
                       * sin( radians( heritage_site.latitude ) ) ) )');
        $heritage_sites =  DB::table('heritage_site')
                    ->select('*')
                    ->selectRaw("{$sqlDistance} AS distance")
                    ->orderBy('distance')
                    ->get();

        $preferences = DB::table('favorite')
            ->select('*')
            ->where('user_email', '=', 'giorgio@gmail.com')
            ->get();

        for ($i = 0; $i < count($heritage_sites); $i++) {
            $artworks = DB::table('artwork')
                ->select('*')
                ->where('heritage_site_id', '=', $heritage_sites[$i]->id)
                ->get();
            $count = 0;
            for($j = 0; $j < count($artworks); $j++) {
                for($x = 0; $x < count($preferences); $x++) {
                    if ($artworks[$j]->id == $preferences[$x]->artwork_id) {
                        $count++;
                    }
                }
            }
            $matches[$i] = $count;
        }
        dd($matches);
    }
}
