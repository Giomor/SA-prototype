<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\HeritageSite;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TicketController extends Controller
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

    public function getAllAvailableHeritageTickets($heritageSites_id) {

        $heritageSite = HeritageSite::find($heritageSites_id);
        $tickets =  DB::table('ticket')
            ->select('*')
            ->where([
                ['heritage_site_id','=', $heritageSites_id],
                ['booked', '=', '0'],
            ])
            ->get();

        return view('available-tickets', [
            "tickets" => $tickets,
            "heritageSite" => $heritageSite,
        ]);
    }

    public function bookTicket($ticket_id) {
        $user = Auth::user();
        //generate unique ticket code
        $number = Str::random(6);
        if (Booking::where('code', $number)->count() > 0) Ticket::generateNumber();
        $booking = Booking::create([
            'code' => $number,
            'user_email' => $user->email,
            'ticket_id' => $ticket_id
        ]);
        $ticket = Ticket::find($ticket_id);
        $ticket->booked = 1;
        $ticket->save();
        return view('ticket', [
            "ticket" => $booking,
            "user" => $user
        ]);

    }

}
