<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = ['date'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function heritage_site() {
        return $this->belongsTo(HeritageSite::class);
    }

}
