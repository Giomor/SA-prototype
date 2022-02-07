<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table ="ticket";
    protected $fillable = ['datetime','booked','heritage_site_id'];

    public function heritageSite() {
        return $this->belongsTo(HeritageSite::class);
    }
}
