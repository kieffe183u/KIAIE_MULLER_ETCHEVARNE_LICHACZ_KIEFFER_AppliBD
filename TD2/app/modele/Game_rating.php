<?php

namespace gamepedia\modele;

use Illuminate\Database\Eloquent\Model;

class Game_rating extends Model
{

    public $timestamps = false;
    protected $table = 'game_rating';
    protected $primaryKey = 'id';

}