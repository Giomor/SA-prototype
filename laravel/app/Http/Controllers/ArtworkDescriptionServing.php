<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use App\Models\Analytics;
use Carbon\Carbon;

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
                array_push($retmap,DB::table('artwork')->select('*')->where('id','=',$value)->first());
            }
            
            return  response(["rm"=>$retmap], 200)->header('Content-Type', 'application/javascript');;
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
    public function endCheck(Request $request){
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: *");
        $map=$request->all();
        $mapexp=explode(",",$map["pec"]);
        $time=Carbon::now()->toDateTimeString();
        $js=json_decode($map["pec"]);
        foreach ($js->check as $key=>$value) {
            $e=DB::table('artwork')->select('*')->where('id','=',$key)->first();
            
            Analytics::create([
                "date"=>$time,	
                "time"=>$value,
                "user_id"=>Auth::user()->id,
                "iot_id"=>$e->iotDescrId,
                "artwork_id"=>$e->id
            ]);
        }
        return  response(null, 200)
        ->header('Content-Type', 'text/json');
    }
}
