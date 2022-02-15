<?php

namespace App\Http\Controllers;

use App\Models\Analytics;
use App\Models\Artwork;
use App\Models\AssociationArtworkTag;
use App\Models\Favorite;
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

        return view('recommended-museums', [
            "heritageSite" => $heritage_site,
            "recommendations" => $recommendations
        ]);

    }

    public function suggestRoute()
    {
        $user = Auth::user();
        $preferences = Favorite::with('artwork')->where('user_email','=',$user->email)->get();
        $analytics = Analytics::with('artwork')->where([
                                                            ['user_id','=',$user->id],
                                                            ['time','>=',300]
                                                        ])->get();
        $artworks = Artwork::with('heritage_site')->get();

        $suggestedArtworks = array();
        foreach ($artworks as $a) {
            $tags = AssociationArtworkTag::with('tag')->where('artwork_id','=',$a->id)->get();
            foreach ($tags as $t) {
                foreach ($preferences as $p) {
                    $preferencesTags = AssociationArtworkTag::with('tag')->where('artwork_id','=',$p->artwork->id)->get();
                    foreach($preferencesTags as $pt) {
                        if ($t->tag->keyword == $pt->tag->keyword && !in_array($a, $suggestedArtworks)) {
                            $suggestedArtworks[] = $a;
                        }
                    }
                }
                foreach ($analytics as $elem) {
                    $analyticsTags = AssociationArtworkTag::with('tag')->where('artwork_id','=',$elem->artwork->id)->get();
                    foreach($analyticsTags as $at) {
                        if ($t->tag->keyword == $at->tag->keyword && !in_array($a, $suggestedArtworks)) {
                            $suggestedArtworks[] = $a;
                        }
                    }
                }
            }
        }
        return view('suggested-artworks', [
            "suggestedArtworks" => $suggestedArtworks
        ]);
    }

}
