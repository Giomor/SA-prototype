<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Analytics extends Model
{
    protected $table ="analytics";
    protected $fillable = ['time', 'date','user_id','iot_id','artwork_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function IoT() {
        return $this->belongsTo(IoT::class);
    }

    public function artwork() {
        return $this->belongsTo(Artwork::class);
    }

}
