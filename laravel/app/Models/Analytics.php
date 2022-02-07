<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Analytics extends Model
{
    protected $table ="analytics";
    protected $fillable = ['time', 'date','user_email','artwork_id'];

    public function IoT() {
        return $this->belongsTo(IoT::class);
    }

    public function artwork() {
        return $this->belongsTo(Artwork::class);
    }

}
