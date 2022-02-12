<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\HeritageSite;
use App\Models\IoT;
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
        $artwork = Artwork::create([
            'name' => $request->name,
            'description' => $request->description,
            'heritage_site_id' => $request->id
        ]);
        return redirect('backend/artworks');
    }

    public function updateArtwork(Request $request)
    {
        $artwork = Artwork::find($request->id);
        $artwork->name = $request->name;
        $artwork->description = $request->description;
        $artwork->save();
        return redirect('backend/artworks');
    }

    public function deleteArtwork(Request $request)
    {
        DB::table('artwork')->where('id', '=', $request->id)->delete();
        return Redirect::back()->with('artworkdeleted','Artwork Deleted');
    }
}