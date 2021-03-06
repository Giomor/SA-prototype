<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table ="favorite";
    protected $fillable = ['date','user_email','artwork_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }
    //TODO: Artwork or Heritage site?
    public function artwork() {
        return $this->belongsTo(Artwork::class);
    }
}
