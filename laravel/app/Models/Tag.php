<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table ="tag";
    protected $fillable = ['keyword'];

    public function artworks() {
        return $this->hasMany(Artwork::class);
    }

    public function associations(){
        return $this->belongsToMany( 'AssociationArtworkTag', 'association_artwork_tag', 'tag_id', 'artwork_id');
    }

}
