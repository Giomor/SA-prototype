<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IoT extends Model
{
    protected $table ="iot";
    protected $fillable = ['name', 'type','area','heritage_site_id'];

    public function heritage_site() {
        return $this->belongsTo(HeritageSite::class);
    }

    public function analytics() {
        return $this->hasMany(Analytics::class);
    }

    public function artworks() {
        return $this->hasMany(Artwork::class);
    }


}
