<?php

use Illuminate\Database\Capsule\Manager as DB;
use Slim\Container;

require_once __DIR__ . '/vendor/autoload.php';

//-------- Config --------//
$db = new DB();
$creds = parse_ini_file("creds.ini");
$settings = ['settings' => [
    'displayErrorDetails' => true
]];
$container = new Container($settings);
$app = new \Slim\App($container);
if ($creds) $db->addConnection($creds);
$db->setAsGlobal();
$db->bootEloquent();

//Route Exo 1

$app->get('/api/games/{id}[/]', \gamepedia\controller\Game::class . ':showGame')
    ->setName("showGame");

$app->get('/api/games[/]', \gamepedia\controller\Game::class . ':showAllGames')
    ->setName("showAllGames");

$app->get('/api/games/{id}/comments[/]', \gamepedia\controller\Commentary::class . ':showComments')
    ->setName("showComments");

$app->get('/api/games/{id}/characters[/]', \gamepedia\controller\Character::class . ':showCharacters')
    ->setName("showCharacters");

$app->get('/api/character/{id}[/]', \gamepedia\controller\Character::class . ':showCharacter')
    ->setName("showCharacter");

$app->get('/api/platforms/{id}/description[/]', \gamepedia\controller\Platform::class . ':showDescription')
    ->setName("ShowDescription");

$app->run();
