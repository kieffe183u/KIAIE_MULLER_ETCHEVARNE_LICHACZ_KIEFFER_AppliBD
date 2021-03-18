<?php

namespace gamepedia\modele;

require_once __DIR__ . '/../../vendor/autoload.php';

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{

    public $timestamps = false;
    protected $table = 'platform';
    protected $primaryKey = 'id';

}