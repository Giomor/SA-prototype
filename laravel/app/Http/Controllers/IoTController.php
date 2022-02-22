<?php

namespace App\Http\Controllers;

use App\Models\IoT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class IoTController extends Controller
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

    public function getAllIoT()
    {
        $heritage_sites =  DB::table('heritage_site')
            ->select('*')
            ->get();
        $iot =  DB::table('iot')
            ->select('*')
            ->get();
        return view('iot', [
            "iot" => $iot,
            "heritage_sites" => $heritage_sites
        ]);
    }

    public function addIoT($heritageSiteId)
    {
        return view('add-iot', [
            "heritage_site_id" => $heritageSiteId
        ]);
    }

    public function editIoT($iotId)
    {
        $iot = IoT::find($iotId);
        return view('edit-iot', [
            "iot" => $iot
        ]);
    }

    public function storeIot(Request $request)
    {
        $iot = IoT::create([
            'name' => $request->name,
            'type' => $request->type,
            'area' => $request->area,
            'heritage_site_id' => $request->id
        ]);
        return redirect('backend/iot');
    }

    public function updateIot(Request $request)
    {
        $iot = IoT::find($request->id);
        $iot->name = $request->name;
        $iot->type = $request->type;
        $iot->area = $request->area;
        $iot->save();
        return redirect('backend/iot');
    }

    public function deleteIot(Request $request)
    {
        DB::table('iot')->where('id', '=', $request->id)->delete();
        DB::table('analytics')->where('iot_id', '=', $request->id)->delete();
        return Redirect::back()->with('iotdeleted','Component Deleted');
    }
}
