<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jeu extends Model
{
    protected $table = 'jeux';
    public $timestamps = false;

    function commentaires() {
        return $this->hasMany(Commentaire::class);
    }

    function tags() {
        return $this->belongsToMany(Tag::class);
    }

}
