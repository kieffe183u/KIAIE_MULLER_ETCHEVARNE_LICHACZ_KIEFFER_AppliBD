<?php

namespace gamepedia\modele;

use Illuminate\Database\Eloquent\Model;

class Compagny extends Model
{

    public $timestamps = false;
    protected $table = 'compagny';
    protected $primaryKey = 'id';

}