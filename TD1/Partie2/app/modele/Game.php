<?php

namespace gamepedia\modele;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{

    public $timestamps = false;
    protected $table = 'game';
    protected $primaryKey = 'id';

}