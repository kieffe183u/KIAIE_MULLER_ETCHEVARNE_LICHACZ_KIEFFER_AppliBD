<?php

namespace gamepedia\modele;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{

    public $timestamps = false;
    protected $table = 'genre';
    protected $primaryKey = 'id';

}