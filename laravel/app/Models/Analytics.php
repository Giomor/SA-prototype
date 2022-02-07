<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Analytics extends Model
{
    //TODO: add some attributes

    public function IoT() {
        return $this->belongsTo(IoT::class);
    }

    public function artwork() {
        return $this->belongsTo(Artwork::class);
    }

}
