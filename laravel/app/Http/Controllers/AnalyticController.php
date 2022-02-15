<?php

namespace App\Http\Controllers;

use App\Models\Analytics;
use Illuminate\Http\Request;

class AnalyticController extends Controller
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

    public function getAnalytics()
    {
        $analytics = Analytics::with('artwork','user')
            ->select('*')
            ->orderBy('analytics.artwork_id')
            ->get();

        return view('analytics', [
            "analytics" => $analytics,
        ]);
    }


}
