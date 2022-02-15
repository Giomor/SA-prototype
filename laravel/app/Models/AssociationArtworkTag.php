<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssociationArtworkTag extends Model
{
    protected $table ="association_artwork_tag";
    protected $fillable = ['artwork_id','tag_id'];

    public function tag() {
        return $this->belongsTo(Tag::class);
    }

    public function artwork() {
        return $this->belongsTo(Artwork::class);
    }

    public function tags(){
        return $this->belongsToMany( 'App\Models\Tag', 'associations_artwork_tag', 'id', 'tag_id');
    }

}
