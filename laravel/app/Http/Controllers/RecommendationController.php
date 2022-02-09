<?php

namespace App\Http\Controllers;

use App\Models\HeritageSite;
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

    public function recommendMuseums($heritageSite_id) {

        $user = Auth::user();

        $heritage_site = HeritageSite::find($heritageSite_id);
        $latitude = $heritage_site->latitude;
        $longitude = $heritage_site->longitude;
        //Haversine formula to calculate distance between two points
        $sqlDistance = DB::raw('( 6371 * acos( cos( radians(' . $latitude . ') )
                       * cos( radians( heritage_site.latitude ) )
                       * cos( radians( heritage_site.longitude )
                       - radians(' . $longitude  . ') )
                       + sin( radians(' . $latitude  . ') )
                       * sin( radians( heritage_site.latitude ) ) ) )');
        /*$heritage_sites =  DB::table('heritage_site')
                    ->select('*')
                    ->selectRaw("{$sqlDistance} AS distance")
                    ->orderBy('distance')
                    ->get();*/
        //Get all museums in a radius of 15km, ordered by matches based on user preferences
        $recommendations = DB::table('artwork')
            ->join('favorite', 'favorite.artwork_id', '=', 'artwork.id')
            ->join('heritage_site', 'artwork.heritage_site_id', '=', 'heritage_site.id')
            ->select('heritage_site.id','heritage_site.name','heritage_site.description','heritage_site.latitude','heritage_site.longitude')
            ->selectRaw("{$sqlDistance} AS distance")
            ->whereRaw("{$sqlDistance} <= ?", [15])
            ->selectRaw('count(*) as matches_count')
            ->where([
                ['heritage_site.id', '!=', $heritageSite_id],
                ['favorite.user_email', '=', $user->email],
            ])
            ->groupBy('heritage_site.id','heritage_site.name','heritage_site.description','heritage_site.latitude','heritage_site.longitude')
            ->orderBy('matches_count','DESC')
            ->get();
        //dd($recommendations);


        return view('recommended-museums', [
            "recommendations" => $recommendations
        ]);

    }
}
