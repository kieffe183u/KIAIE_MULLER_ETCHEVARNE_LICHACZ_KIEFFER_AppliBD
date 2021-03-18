<?php


namespace gamepedia\modele;


use Illuminate\Database\Eloquent\Model;

class Game2character extends Model
{
    public $timestamps = false;
    protected $table = 'game2character';
    protected $primaryKey = ['game_id','character_id'];

}