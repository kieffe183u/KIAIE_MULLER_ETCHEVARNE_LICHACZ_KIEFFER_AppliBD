<?php

namespace gamepedia\modele;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    public $timestamps = false;
    protected $table = 'user';
    protected $primaryKey = 'email';

    public  $incrementing = false;
    public $keyType='string';




}