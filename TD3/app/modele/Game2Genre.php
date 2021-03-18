<?php


namespace gamepedia\modele;


use Illuminate\Database\Eloquent\Model;

class Game2Genre extends Model
{
    public $timestamps = false;
    protected $table = 'game2genre';
    protected $primaryKey = ['game_id','genre_id'];


}