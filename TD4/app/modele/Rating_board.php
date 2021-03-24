<?php

namespace gamepedia\modele;

use Illuminate\Database\Eloquent\Model;

class Rating_board extends Model
{

    public $timestamps = false;
    protected $table = 'rating_board';
    protected $primaryKey = 'id';

}