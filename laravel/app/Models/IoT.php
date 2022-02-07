<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IoT extends Model
{
    protected $fillable = ['name', 'type','area'];

    public function analytics() {
        return $this->hasMany(Analytics::class);
    }

    public function artworks() {
        return $this->hasMany(Artwork::class);
    }


}
