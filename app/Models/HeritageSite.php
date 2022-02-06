<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeritageSite extends Model
{
    //TODO: maybe add opening time
    protected $fillable = ['name', 'description','crowd_limit','maximum_tickets','latitude','longitude'];

    public function tickets() {
        return $this->hasMany(Ticket::class);
    }
    //TODO: add the following relationships in the E-R model?
    public function artworks() {
        return $this->hasMany(Artwork::class);
    }

    public function IoT() {
        return $this->hasMany(IoT::class);
    }

}
