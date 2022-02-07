<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HeritageSiteController extends Controller
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

    public function getAllHeritageSites()
    {

        $heritageSites =  DB::table('heritage_site')
            ->select('*')
            ->get();
        return view('heritage-sites', [
            "heritage_sites" => $heritageSites
        ]);
    }
}
