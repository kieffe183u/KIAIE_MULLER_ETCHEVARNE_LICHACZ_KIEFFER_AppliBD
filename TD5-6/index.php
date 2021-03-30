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
if ($creds) $db->addConnection($creds);
$db->setAsGlobal();
$db->bootEloquent();

$faker = Faker\Factory::create('fr_FR');

/**
 *

for ($i = 0 ; $i < 25000 ; $i++){
    $user = new User();
    $user->email = $faker->email();
    $user->nom = $faker->lastName();
    $user->prenom = $faker->firstName();
    $user->adresse = $faker->address();
    $user->datenaiss = $faker->date();
    $user->numtel = $faker->phoneNumber();
    $user->save();
}


$users = User::all();
$emails = array();

foreach ($users as $user){
    array_push($emails, $user->email);
}



for ($i = 0 ; $i < 250000 ; $i++){
    $com = new Commentary();
    $com->id = $i + 582;
    $com->titre = $faker->text(30);
    $com->contenu= $faker->text();
    $com->date = $faker->date();
    $com->created_at = $faker->dateTimeBetween("-5 years","now");
    $com->updated_at = $faker->dateTime("now");
    $com->email = $emails[array_rand($emails, 1)];
    $com->game_id = $faker->numberBetween(1,47948);
    $com->save();
    echo $i."\n";
}
 */
// Requete 1
// select date from commentary natural join user where nom = "john?" order by desc;
//
$Q1 = Commentary::all()->orderBy('date','DESC');

foreach ($Q1 as $l){
    $urs = $l->publishers()->where("name","like","Dumont")->get();
    echo $urs->nom. ' '. $urs->prenom. '<br>'. new DateTime($l->date);
}

// Requete 2
//SELECT * FROM commentary group by email HAVING count(email) >5;
$count = Commentary::count('email');
$Q2 = Commentary::all()->groupBy('email')->having($count, ">", "5")-get();

foreach ($Q2 as $l){
    echo $l.'<br>';
}



