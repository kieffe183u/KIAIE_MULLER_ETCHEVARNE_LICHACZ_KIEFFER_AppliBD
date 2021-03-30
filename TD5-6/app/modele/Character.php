<?php

namespace gamepedia\modele;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{

    public $timestamps = false;
    protected $table = 'character';
    protected $primaryKey = 'id';

    public function games() {
        return $this->belongsToMany ("gamepedia\modele\Game", "game2character", "character_id", "game_id");
    }

    public function first_appeared_in_game_id(){
        return $this->belongsTo("gamepedia\modele\Game", "first_appeared_in_game_id","id");
    }

}