<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\HeritageSite;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BookingController extends Controller
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

    public function crowdSize() {

            $crowdSize = DB::table('bookings')
                ->select('heritage_site.id','heritage_site.name')
                ->join('ticket','ticket.id','=','bookings.ticket_id')
                ->join('heritage_site', 'ticket.heritage_site_id', '=', 'heritage_site.id')
                ->selectRaw('count(*) as crowd_inside')
                ->where([
                    ['check_enter','=',1],
                    ['check_exit', '=', 0]
                    ])
                ->groupBy('heritage_site.id','heritage_site.name')
                ->get();


        return view('crowd-size', [
            "crowdSize" => $crowdSize,
        ]);
    }


}
