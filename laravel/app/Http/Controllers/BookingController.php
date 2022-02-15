<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\HeritageSite;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function crowdSize()
    {

        $crowdSize = DB::table('bookings')
            ->select('heritage_site.id', 'heritage_site.name')
            ->join('ticket', 'ticket.id', '=', 'bookings.ticket_id')
            ->join('heritage_site', 'ticket.heritage_site_id', '=', 'heritage_site.id')
            ->selectRaw('count(*) as crowd_inside')
            ->where([
                ['check_enter', '=', 1],
                ['check_exit', '=', 0]
            ])
            ->groupBy('heritage_site.id', 'heritage_site.name')
            ->get();


        return view('crowd-size', [
            "crowdSize" => $crowdSize,
        ]);
    }

    public function addTicket($heritageSiteId)
    {
        $tickets = DB::table('ticket')
            ->select('*')
            ->where([
                ['heritage_site_id','=', $heritageSiteId],
                ['booked', '=', '0'],
            ])
            ->get();
        return view('add-ticket', [
            "heritage_site_id" => $heritageSiteId,
            "tickets" => $tickets
        ]);
    }

    public function storeBook(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $ticket = Ticket::find($request->ticket);
        $ticket->booked = 1;
        $ticket->save();
        $number = Str::random(6);
        if (Booking::where('code', $number)->count() > 0) Ticket::generateNumber();
        $user = User::create([
            'email' => $email,
            'name' => $name,
            'password' => " ",
            'admin' => 0
        ]);
        $booking = Booking::create([
            'code' => $number,
            'user_email' => $email,
            'ticket_id' => $ticket->id
        ]);
        $heritage_site = HeritageSite::find($ticket->heritage_site_id);
        return view('ticket', [
            "ticket" => $ticket,
            "user" => $user,
            "heritageSite" => $heritage_site,
        ]);

    }


}
