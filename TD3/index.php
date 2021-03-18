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

echo '<h1>Partie 1</h1>';

//Question 1

$tmp1 = microtime(true);
$Question1 = Game::select('game.name')->get();
$tmp2 = microtime(true);
$tmpQ1 = $tmp2 - $tmp1;


echo '<h2> Question 1 </h2>';
echo "la durée d'execution est de ".$tmpQ1." secondes <br>";

//Question 2

$tmp3 = microtime(true);
$Question2 =Game::select('game.name')->where('game.name','like', 'Mario%');
$tmp4 = microtime(true);
$tmpQ2 = $tmp4 - $tmp3;

echo '<h2> Question 2 </h2>';
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

echo '<h2> Question 3 </h2>';
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

echo '<h2> Question 4 </h2>';
echo "la durée d'execution est de ".$tmpQ4." secondes <br>";


// Partie 1 : Index

echo '<h1> Partie 1 : index';

$tmp1bis = microtime(true);
$Question11 = Game::where('name', 'LIKE', 'Lara%')->get();
$tmp2bis = microtime(true);
$tmpQ11 = $tmp2bis - $tmp1bis;

echo '<h2> Question 1 index </h2>';
echo '<h3> Pour les jeux commençant par Lara</h3>';
echo "la durée d'execution est de ".$tmpQ11." secondes <br>";

$tmp3bis = microtime(true);
$Question12 = Game::where('name', 'LIKE', 'Crash%')->get();
$tmp4bis = microtime(true);
$tmpQ12 = $tmp4bis - $tmp3bis;

echo '<h3> Pour les jeux commençant par Crash</h3>';
echo "la durée d'execution est de ".$tmpQ12." secondes <br>";

$tmp5bis = microtime(true);
$Question13 = Game::where('name', 'LIKE', 'Desert%')->get();
$tmp6bis = microtime(true);
$tmpQ13 = $tmp6bis - $tmp5bis;

echo '<h3> Pour les jeux commençant par Desert</h3>';
echo "la durée d'execution est de ".$tmpQ13." secondes <br>";

//Pensez à créer l'index dans mysql
//Valeur 1 pour Lara : 0.059530973434448
//Valeur 1 pour Crash : 0.061686038970947
//Valeur 1 pour Desert : 0.061500072479248
//Valeur 2 pour Lara : 0.00059986114501953
//Valeur 2 pour Crash : 0.00072002410888672
//Valeur 2 pour Desert : 0.00039100646972656

$tmp1bis = microtime(true);
$Question11 = Game::where('name', 'LIKE', '%Lara%')->get();
$tmp2bis = microtime(true);
$tmpQ11 = $tmp2bis - $tmp1bis;

echo '<h2> Question 2 Index  </h2>';
echo '<h3> Pour les jeux contenant Lara</h3>';
echo "la durée d'execution est de ".$tmpQ11." secondes <br>";

$tmp3bis = microtime(true);
$Question12 = Game::where('name', 'LIKE', 'Crash%')->get();
$tmp4bis = microtime(true);
$tmpQ12 = $tmp4bis - $tmp3bis;

echo '<h3> Pour les jeux contenant Crash</h3>';
echo "la durée d'execution est de ".$tmpQ12." secondes <br>";

$tmp5bis = microtime(true);
$Question13 = Game::where('name', 'LIKE', 'Desert%')->get();
$tmp6bis = microtime(true);
$tmpQ13 = $tmp6bis - $tmp5bis;

echo '<h3> Pour les jeux contenant Desert</h3>';
echo "la durée d'execution est de ".$tmpQ13." secondes <br>";


//Pensez à supprimer et refaire l'index dans mysql
//Valeur 1 pour Lara : 0.092345952987671
//Valeur 1 pour Crash : 0.078277111053467
//Valeur 1 pour Desert : 0.074573993682861
//Valeur 2 pour Lara : 0.069234848022461
//Valeur 2 pour Crash : 0.0011529922485352
//Valeur 2 pour Desert : 0.064206123352051

//Le trie de l'index n'est ps utile ici, c'est pour cela que les valeurs ne sont pas plus rapides


$tmp1bis = microtime(true);
$Question31 = Company::where("location_country", "like",  "Japan")->get();
$tmp2bis = microtime(true);
$tmpQ31 = $tmp2bis - $tmp1bis;

echo '<h2> Question 3 Index  </h2>';
echo '<h3> Pour La liste des compagnies du Japon</h3>';
echo "la durée d'execution est de ".$tmpQ31." secondes <br>";


//Pensez à supprimer et refaire l'index dans mysql
//Valeur 1 : 0.01842188835144
//Valeur 2 : 0.0075109004974365
//Il n'y a pas de valeurs assez différentes pour avoir un résultat vraiment conséquent et que l'index soit intéressant


//Partie 2

$db::connection()->enableQueryLog();


echo '<h1> Partie 2 </h1>';
echo '<h2> Question 1 </h2>';
$Part2Q1 =Game::select('game.name')->where('game.name','like', 'Breakfree%')->get();
$queries = $db::getQueryLog();


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


affichage($queries);






