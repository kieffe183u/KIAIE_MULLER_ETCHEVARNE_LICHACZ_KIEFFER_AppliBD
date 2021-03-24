<?php

namespace gamepedia\modele;

use Illuminate\Database\Eloquent\Model;

class Commentary extends Model
{

    public $timestamps = true;
    protected $table = 'commentary';
    protected $primaryKey = 'id';


}