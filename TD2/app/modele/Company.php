<?php

namespace gamepedia\modele;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    public $timestamps = false;
    protected $table = 'company';
    protected $primaryKey = 'id';

    public function games() {
        return $this->belongsToMany ("gamepedia\modele\Game", "game_publishers", "comp_id", "game_id");
    }

}