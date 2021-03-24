<?php

namespace gamepedia\modele;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{

    public $timestamps = false;
    protected $table = 'game';
    protected $primaryKey = 'id';

    public function characters() {
        return $this->belongsToMany ("gamepedia\modele\Character", "game2character", "game_id", "character_id");
    }

    public function rating() {
        return $this->belongsToMany ("gamepedia\modele\Game_rating", "game2rating", "game_id", "rating_id");
    }

    public function company_publishers() {
        return $this->belongsToMany ("gamepedia\modele\Company", "game_publishers", "game_id", "comp_id");
    }

    public function game_developers() {
        return $this->belongsToMany("gamepedia\modele\Company", "game_developers", "game_id", "comp_id");
    }

}