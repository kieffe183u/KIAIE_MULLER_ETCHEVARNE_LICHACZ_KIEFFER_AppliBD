<?php

namespace gamepedia\modele;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{

    public $timestamps = false;
    protected $table = 'genre';
    protected $primaryKey = 'id';

    public function games(){
        return $this->belongsToMany ("gamepedia\modele\Game", "game2genre", "genre_id", 'game_id');
    }

}