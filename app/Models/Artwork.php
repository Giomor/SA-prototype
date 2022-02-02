<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    protected $fillable = ['name', 'description'];

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
