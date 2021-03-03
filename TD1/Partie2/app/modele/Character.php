<?php

namespace gamepedia\modele;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{

    public $timestamps = false;
    protected $table = 'character';
    protected $primaryKey = 'id';

}