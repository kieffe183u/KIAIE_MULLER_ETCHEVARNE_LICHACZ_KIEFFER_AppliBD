<?php

namespace gamepedia\modele;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    public $timestamps = false;
    protected $table = 'company';
    protected $primaryKey = 'id';

}