<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    protected $table ="artwork";
    protected $fillable = ['name', 'description', 'heritage_site_id'];

    public function heritage_site() {
        return $this->belongsTo(HeritageSite::class);
    }

    public function analytics() {
        return $this->hasMany(Analytics::class);
    }

    public function media() {
        return $this->hasMany(Media::class);
    }
    //TODO: To be analyzed if this is right or if we need another class
    public function IoT() {
        return $this->hasMany(IoT::class);
    }

}
