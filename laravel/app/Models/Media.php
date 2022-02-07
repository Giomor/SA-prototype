<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = ['name', 'file'];

    public function artwork() {
        return $this->belongsTo(Artwork::class);
    }
}
