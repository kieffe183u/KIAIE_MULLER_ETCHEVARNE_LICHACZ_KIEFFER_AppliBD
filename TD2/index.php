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

$listeQ1 = Game::find(12342);
$listeQ1 = $listeQ1->characters();

$listeQ2 = Game::where('name', 'LIKE', 'Mario%')->get();

$listeQ3 = Company::where("name", "LIKE", "%Sony%")->get();

$listeQ4 = Game::where('name', 'LIKE', '%Mario%')->get();

$listeQ5 = Game::where('name', 'LIKE', 'Mario%')->get();

$listeQ6 = Game::where('name', 'LIKE', 'Mario%')->get();

$listeQ7 = Game::where('name', 'LIKE', 'Mario%')->
                                                whereHas('company_publishers', function($company)
                                                { $company->where('name', 'LIKE', '%INC.%');
                                                })->get();

$listeQ8 = Game::where('name', 'LIKE', 'Mario%')->
                                                whereHas('company_publishers', function($company)
                                                { $company->where('name', 'LIKE', '%INC%');
                                                })->get();

echo '<h1>Question 1</h1>';
foreach ($listeQ1 as $l){
    echo $l->name . " : " . $l->deck . "<br><br>";
}

echo '<h1>Question 2</h1>';

foreach ($listeQ2 as $l){
    $perso = $l->characters;
    echo "<h3>Persos du jeu : $l->name</h3>";
    foreach ($perso as $p) {
        echo $p->name . "<br>";
    }
}
echo '<h1>Question 3</h1>';

foreach ($listeQ3 as $l){
    $jeux = $l->games;
    echo "<h3>Jeux de : $l->name</h3>";
    foreach ($jeux as $j) {
        echo $j->name . "<br>";
    }
}

echo '<h1>Question 4</h1>';

foreach ($listeQ4 as $l){
        $rating = $l->rating()->get()->take(1);
        echo "<h3>Jeu : $l->name</h3>";
        foreach ($rating as $r) {
            echo $r->rating_board->name . "<br>";
        }
}

echo '<h1>Question 5</h1>';

foreach ($listeQ5 as $l){
    $game = $l->has("characters", ">" , "3")->get();
    foreach ($game as $g){
        echo $g->name . "<br>";
    }
}

echo '<h1>Question 6</h1>';

foreach ($listeQ6 as $l){
    if(strpos($l->rating()->first(),"3+")) {
        echo "<h3>Jeu : $l->name, rating : {
        $l->rating()->first()->name
        }</h3>";
    }
}

echo '<h1>Question 7</h1>';

foreach ($listeQ7 as $l){
    if(strpos($l->rating()->first(),"3+")){
        echo $l->name . "<br>";
    }
}

echo '<h1>Question 8</h1>';

foreach ($listeQ8 as $l) {
    if(strpos($l->rating()->first(),"3+")){
        $test = false;
        foreach ($l->rating as $r) {
            if(!$test && strpos($r,"CERO")) {
                $test = true;
            }
        }
        if($test){
            echo $l->name . "<br>";
        }
    }
}

//Question 9
$genre = new Genre();
$genre->name = "TestGenre";
$genre->save();
$genre->games()->attach([12,56,345]);
