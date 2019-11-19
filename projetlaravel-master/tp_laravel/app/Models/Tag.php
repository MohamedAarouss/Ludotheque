<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'jeux';

    function jeux() {
        return $this->belongsToMany(Jeu::class);
    }
}
