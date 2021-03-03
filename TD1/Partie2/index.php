<?php

use Illuminate\Database\Capsule\Manager as DB;
use gamepedia\modele\Game as Game;

require_once __DIR__ . '/vendor/autoload.php';

//-------- Config --------//

$app = new \Slim\App();

$db = new DB();
$creds = parse_ini_file("creds.ini");
if ($creds) $db->addConnection($creds);
$db->setAsGlobal();
$db->bootEloquent();

$listes = Game::where('name', 'like', '%mario%') ->get();

//$listecomp = Company::all()->where("location_adress", "=",  "Japon")->get();

//$listeplat = Platform::all()->where("install_base", ">=",  "10000000")->get();

echo "test";

//foreach ($listes as $l){
//    echo $l;
//}
