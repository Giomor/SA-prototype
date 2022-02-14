<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;

class ArtworkDescriptionServing extends Controller
{
    public function testingFeature(Request $request,$id){
        if(Auth::user()){
            $IoT =  DB::table('artwork')->select('*')->where('heritage_site_id','=',$id)->get();
            return view('test-artprox',[
                "IoT" => $IoT,
                "uid" => Auth::id()
            ]);
        }else{
            return view('login');
        }
    }
    public function deviceAggregation(Request $request){
        if(Auth::user()){
            
            $map=$request->all();
            $mapexp=explode(",",$map["mapofid"]);
            
            $retmap=array();
            foreach ($mapexp as $value) {
                $retmap[] = DB::table('artwork')->select('*')->where('id','=',$value)->get();
            }
            return  response($retmap, 200)
            ->header('Content-Type', 'text/json');
            /*return response(request->all(), 200)
            ->header('Content-Type', 'text/json');*/
        }
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
