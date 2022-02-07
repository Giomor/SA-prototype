<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table ="bookings";
    protected $fillable = ['code', 'ticket_id', 'user_email'];

    public function ticket() {
        return $this->belongsTo(Ticket::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
