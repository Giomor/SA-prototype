<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['code', 'date'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function heritageSite() {
        return $this->belongsTo(HeritageSite::class);
    }
}
