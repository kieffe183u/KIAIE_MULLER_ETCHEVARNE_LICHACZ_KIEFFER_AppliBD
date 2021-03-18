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

// Partie 1

//Question 1

$tmp1 = microtime(true);
$Question1 = Game::select('game.name')->get();
$tmp2 = microtime(true);
$tmpQ1 = $tmp2 - $tmp1;


echo '<h1> Question 1 </h1>';
echo "la durée d'execution est de ".$tmpQ1." secondes <br>";

//Question 2

$tmp3 = microtime(true);
$Question2 =Game::select('game.name')->where('game.name','like', 'Mario%');
$tmp4 = microtime(true);
$tmpQ2 = $tmp4 - $tmp3;

echo '<h1> Question 2 </h1>';
echo "la durée d'execution est de ".$tmpQ2." secondes <br>";

//Question 3

$tmp5 = microtime(true);
$Question3 = Game::where('name', 'LIKE', 'Mario%')->get();
foreach ($Question3 as $l){
    $perso = $l->characters;
    foreach ($perso as $p) {
    }
}
$tmp6 = microtime(true);
$tmpQ3 = $tmp6 - $tmp5;

echo '<h1> Question 3 </h1>';
echo "la durée d'execution est de ".$tmpQ3." secondes <br>";

//Question 4

$tmp7 = microtime(true);
$Question4 = Game::where('name', 'LIKE', 'Mario%')->get();
    foreach ($Question4 as $l){

        if(strpos($l->rating()->first(),"3+")) {
        }
    }
$tmp8 = microtime(true);
$tmpQ4 = $tmp8 - $tmp7;

echo '<h1> Question 4 </h1>';
echo "la durée d'execution est de ".$tmpQ4." secondes <br>";



