<?php

namespace gamepedia\modele;

use Illuminate\Database\Eloquent\Model;

class Commentary extends Model
{

    public $timestamps = true;
    protected $table = 'commentary';
    protected $primaryKey = 'id';

    public function publishers() {
        return $this->belongsTo("gamepedia\modele\User", "email", "email");
    }


}