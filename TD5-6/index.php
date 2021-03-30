<?php

use Illuminate\Database\Capsule\Manager as DB;
use gamepedia\modele\Game as Game;
use gamepedia\modele\Company as Company;
use gamepedia\modele\Platform as Platform;
use gamepedia\modele\Game2character as Game2Character;
use gamepedia\modele\Character as Character;
use gamepedia\modele\Rating_board as Rating_board;
use gamepedia\modele\User as User;
use gamepedia\modele\Commentary as Commentary;

require_once __DIR__ . '/vendor/autoload.php';

//-------- Config --------//

$app = new \Slim\App();

$db = new DB();
$creds = parse_ini_file("creds.ini");
$container = new \Slim\Container($creds);
$app = new \Slim\App($container);
if ($creds) $db->addConnection($creds);
$db->setAsGlobal();
$db->bootEloquent();

//Route Exo 1

$app->get('/api/games/{id}[/]', \gamepedia\controller\Game::class . ':showGame')
    ->setName("showGame");



$app->run();
