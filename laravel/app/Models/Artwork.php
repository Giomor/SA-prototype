<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function tags() {
        return $this->hasMany(Tag::class);
    }

    public function isFavorite() {
        $user = Auth::user();
        $favorites = DB::table('favorite')
            ->select('*')
            ->where([
                ['favorite.artwork_id','=',$this->id],
                ['favorite.user_email','=',$user->email],
            ])
            ->first();
        if($favorites != null)
            return true;
        else
            return false;
    }

}
