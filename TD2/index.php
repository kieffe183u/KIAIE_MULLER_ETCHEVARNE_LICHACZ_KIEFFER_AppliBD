<?php

use Illuminate\Database\Capsule\Manager as DB;
use gamepedia\modele\Game as Game;
use gamepedia\modele\Company as Company;
use gamepedia\modele\Platform as Platform;
use gamepedia\modele\Game2character as Game2Character;
use gamepedia\modele\Character as Character;
use gamepedia\modele\Rating_board as Rating_board;

require_once __DIR__ . '/vendor/autoload.php';

//-------- Config --------//

$app = new \Slim\App();

$db = new DB();
$creds = parse_ini_file("creds.ini");
if ($creds) $db->addConnection($creds);
$db->setAsGlobal();
$db->bootEloquent();

//TD2

$listeQ1 = Character::select('name','deck')->join('game2character','character.id','=','game2character.character_id')->where('game_id','=','12342')->distinct()->get();

$listeQ2 = Game2Character::select('character_id')->join('game','game2character.game_id','=','game.id')->where('game.name','like','Mario%')->distinct()->get();

$listeQ3 = Game::select('game.name')->join('game_developers','game.id','=','game_developers.game_id')->join('company','company.id','=','game_developers.comp_id')->where('company.name','like','%Sony%')->distinct()->get();

$listeQ4 = Rating_board::select('rating_board.name')->join('game2rating', 'rating_board.id', '=', 'game2rating.rating_id')->join('game', 'game2rating.game_id', '=', 'game.id')->where('game.name', 'like', '%Mario%')->distinct()->get();

//$listeQ5 = Game::select('game.name')->join('game2character', 'id', '=', 'game_id')->groupBy('game.name')->having('count(character_id)', '<', 2)->where('game.name', 'like', 'Mario%')->get();

$listeQ6 = Game::select('game.nam   e')->
                                    join('game2rating','game.id','=','game2rating.game_id')->
                                    join('game_rating','game2rating.rating_id','=','game_rating.id')->
                                    where('game_rating.name','like','%3+%')->
                                    where('game.name','like','Mario%')->
                                    distinct()->
                                    get();

$listeQ7 = Game::select('game.name')->
                                    join('game2rating','game.id','=','game2rating.game_id')->
                                    join('game_rating','game2rating.rating_id','=','game_rating.id')->
                                    join('game_developers','game.id','=','game_developers.game_id')->
                                    join('company','company.id','=','game_developers.comp_id')->
                                    where('company.name','like','%Inc.%')->
                                    where('game_rating.name','like','%3+%')->
                                    where('game.name','like','Mario%')->
                                    get();

$listeQ8 = Game::select('game.name')->
                                    join('game2rating','game.id','=','game2rating.game_id')->
                                    join('game_rating','game2rating.rating_id','=','game_rating.id')->
                                    join('rating_board','game_rating.id','=','rating_board.id')->
                                    join('game_developers','game.id','=','game_developers.game_id')->
                                    join('company','company.id','=','game_developers.comp_id')->
                                    where('company.name','like','%Inc.%')->
                                    where('game_rating.name','like','%3+%')->
                                    where('game.name','like','Mario%')->
                                    where('rating_board.name','=','CERO')->
                                    get();

//INSERT INTO genre(id, name, deck, description) VALUES ( 51,'test','test','test');
$insertQ91 = new \gamepedia\modele\Genre();
$insertQ91->id = 51;
$insertQ91->name = 'test';
$insertQ91->deck = 'test';
$insertQ91->description = 'test';
//$insertQ91->save();

//INSERT INTO game2genre(game_id, genre_id) VALUES (12,51),(56,51),(345,51);
$insertQ92Obj1 = new \gamepedia\modele\Game2Genre();
$insertQ92Obj2 = new \gamepedia\modele\Game2Genre();
$insertQ92Obj3 = new \gamepedia\modele\Game2Genre();

//Question 9 a enlever de commentaire pour ajouter.
/**
 *
$insertQ92Obj1->game_id = 12;
$insertQ92Obj1->genre_id = 51;
$insertQ92Obj1->save();

$insertQ92Obj2->game_id = 56;
$insertQ92Obj2->genre_id = 51;
$insertQ92Obj2->save();

$insertQ92Obj3->game_id = 345;
$insertQ92Obj3->genre_id = 51;
$insertQ92Obj3->save();
 * */


echo '<h1>Question 1</h1>';
foreach ($listeQ1 as $l){
    echo $l .'<br>';
}
echo '<h1>Question 2</h1>';

foreach ($listeQ2 as $l){
    echo $l . '<br>';
}
echo '<h1>Question 3</h1>';

foreach ($listeQ3 as $l){
    echo $l . '<br>';
}
echo '<h1>Question 4</h1>';

foreach ($listeQ4 as $l){
    echo $l.'<br>';
}

echo '<h1>Question 5</h1>';

//foreach ($listeQ5 as $l){
//    echo $l.'<br>';
//}

echo '<h1>Question 6</h1>';

foreach ($listeQ6 as $l){
    echo $l.'<br>';
}

echo '<h1>Question 7</h1>';

foreach ($listeQ7 as $l){
    echo $l.'<br>';
}

echo '<h1>Question 8</h1>';

foreach ($listeQ8 as $l){
    echo $l.'<br>';
}
