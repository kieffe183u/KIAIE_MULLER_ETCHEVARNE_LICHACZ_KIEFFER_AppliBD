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


//TD3

//Partie 2

function affichage($queries){
    $i = 0;
    foreach ($queries as $query){
        foreach ($query as $q){
            echo $q. '<br>';
        }
        $i++;
    }
    echo 'Le nombre de log est de '.count($queries).'<br>';
}

$db::connection()->enableQueryLog();


echo '<h1> Partie 2 </h1>';
echo '<h2> Question 1 </h2>';
//$Part2Q1 =Game::select('game.name')->where('game.name','like', 'Mario%')->get();
//$queries = $db::getQueryLog();
//affichage($queries);
//Les lignes sont en paramètres afin de voir le nombre de log uniquement pour une requête




echo '<h2> Question 2 </h2>';

/**
 *
$Part2Q2 = Game::where('id', '=', '12342%')->get();
foreach ($Part2Q2 as $l){
    $perso = $l->characters;
    $l->name;
    foreach ($perso as $p) {
        $p->name;
    }
}
$queries = $db::getQueryLog();
affichage($queries);
*/



echo '<h2> Question 3 </h2>';
/**
 *

$Part2Q3 = Character::all();
$game = Game::where('name', 'LIKE', '%Mario%')->get();
foreach ($Part2Q3 as $p) {
    foreach ($game as $g) {
        if($p->first_appeared_in_game_id === $g->id) {

        }
    }
}

 *  */


echo '<h2> Question 4 </h2>';
/**
 *

$Part2Q4 = Game::where('name', 'like', 'Mario%')->get();
foreach ($Part2Q4 as $l){
    $perso = $l->characters;
    $l->name;
    foreach ($perso as $p) {
        $p->name;
    }
}
$queries = $db::getQueryLog();
affichage($queries);
 **/

echo '<h2> Question 5 </h2>';

$Part2Q5 = Game::where('name', 'LIKE', 'Mario%')->
whereHas('game_developers', function($company)
{ $company->where('name', 'LIKE', '%Sony%');
})->get();

foreach ($Part2Q5 as $l){
    echo $l->name . "<br>";
}
$queries = $db::getQueryLog();
affichage($queries);

