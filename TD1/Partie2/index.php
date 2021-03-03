<?php

use Illuminate\Database\Capsule\Manager as DB;
use gamepedia\modele\Game as Game;
use gamepedia\modele\Company as Company;
use gamepedia\modele\Platform as Platform;

require_once __DIR__ . '/vendor/autoload.php';

//-------- Config --------//

$app = new \Slim\App();

$db = new DB();
$creds = parse_ini_file("creds.ini");
if ($creds) $db->addConnection($creds);
$db->setAsGlobal();
$db->bootEloquent();

$listes = Game::where('name', 'like', '%mario%') ->get();

$listecomp = Company::where("location_address", "=",  "Japon")->get();

$listeplat = Platform::where("install_base", ">=",  "10000000")->get();

$listjeux = Game::skip(21173) -> take(442) -> get();


echo "test";

foreach ($listes as $l){
    print $l;
}

foreach ($listecomp as $l){
    print $l;
}

foreach ($listeplat as $l){
    print $l;
}

foreach ($listjeux as $l){
    print $l;
}

$jeux = Jeux::select('nom','deck')->get();
$i=0;
foreach ($jeux as $j ) {
    echo $j->nom ."   ".$j->deck;
    $i++;
    $page =1;
    if($i == 500){
        echo "page ". $page;
        $page++;
    }
}

