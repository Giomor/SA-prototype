<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class ArtworkDescriptionServing extends Controller
{
    public function testingFeature(Request $request,$id){
        
        $IoT =  DB::table('artwork')
        ->select('*')->
        where('heritage_site_id','=',$id)
        ->get();
        
        return view('test-artprox',[
            "IoT" => $IoT
        ]);
    }
    public function deviceAggregation(Request $request,$id){
        dd($id);
        //DB::table('')
        //json
    }
    public function TFlister(){
        $heritageSites =  DB::table('heritage_site')
        ->select('*')
        ->get();
        return view('heritage-sites-tf', [
            "heritage_sites" => $heritageSites
        ]);
    }
}
