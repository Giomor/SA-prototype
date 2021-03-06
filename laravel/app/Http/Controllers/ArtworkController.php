<?php

namespace App\Http\Controllers;

use App\Models\Analytics;
use App\Models\Artwork;
use App\Models\AssociationArtworkTag;
use App\Models\HeritageSite;
use App\Models\IoT;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ArtworkController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
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

    public function getAllArtworks()
    {
        $heritage_sites =  DB::table('heritage_site')
            ->select('*')
            ->get();
        $artworks =  DB::table('artwork')
            ->select('*')
            ->get();
        return view('artworks', [
            "artworks" => $artworks,
            "heritage_sites" => $heritage_sites
        ]);
    }

    public function getAllFrontendArtworks($heritageSite_id)
    {
        $artworks = Artwork::all();
        $heritageSite = HeritageSite::find($heritageSite_id);

        return view('frontend-artworks', [
            "heritageSite" => $heritageSite,
            "artworks" => $artworks
        ]);
    }

    public function addArtwork($heritageSiteId)
    {
        return view('add-artwork', [
            "heritage_site_id" => $heritageSiteId
        ]);
    }

    public function editArtwork($artworkId)
    {
        $artwork = Artwork::find($artworkId);
        return view('edit-artwork', [
            "artwork" => $artwork
        ]);
    }

    public function storeArtwork(Request $request)
    {
        $myString = $request->tags;
        $tags = explode(',', $myString);

        $artwork = Artwork::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $request->image,
            'heritage_site_id' => $request->id
        ]);
        foreach($tags as $tag) {
            $t = DB::table('tag')->select('*')
                ->where('keyword','=',$tag)->first();
            if($t == null) {
                $t = Tag::create(['keyword' => $tag]);
            }

            $association = AssociationArtworkTag::create([
                'artwork_id' => $artwork->id,
                'tag_id' => $t->id
            ]);
         }
        return redirect('backend/artworks');
    }

    public function updateArtwork(Request $request)
    {
        $artwork = Artwork::find($request->id);
        $artwork->name = $request->name;
        $artwork->description = $request->description;
        $artwork->image = $request->image;
        $artwork->save();
        return redirect('backend/artworks');
    }

    public function deleteArtwork(Request $request)
    {
        DB::table('artwork')->where('id', '=', $request->id)->delete();
        DB::table('analytics')->where('artwork_id', '=', $request->id)->delete();
        DB::table('favorite')->where('artwork_id', '=', $request->id)->delete();
        DB::table('association_artwork_tag')->where('artwork_id', '=', $request->id)->delete();
        return Redirect::back()->with('artworkdeleted','Artwork Deleted');
    }
    public function crowdCheck($id)
    {
        $crowdSize = DB::table('bookings')
            ->select('heritage_site.id', 'heritage_site.name')
            ->join('ticket', 'ticket.id', '=', 'bookings.ticket_id')
            ->join('heritage_site', 'ticket.heritage_site_id', '=', 'heritage_site.id')
            ->selectRaw('count(*) as crowd_inside')
            ->where([
                ['check_enter', '=', 1],
                ['check_exit', '=', 0],
                ['heritage_site.id','=',$id]
            ])
            ->groupBy('heritage_site.id', 'heritage_site.name')
            ->first();
        $IoT =  DB::table('artwork')->select('*')->where('heritage_site_id','=',$id)->get();

        return view('backendcanvas',[
            "crowdSize" => $crowdSize->crowd_inside,
            "IoT" => $IoT,
            "uid" => Auth::id()
        ]);
        return view("backendcanvas");
    }
}
