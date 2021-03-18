<?php

namespace gamepedia\modele;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{

    public $timestamps = false;
    protected $table = 'theme';
    protected $primaryKey = 'id';

}