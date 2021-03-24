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


$utilisateur = new User();
$utilisateur->email = 'mateokieffer@wanadoo.fr';
$utilisateur->nom = 'kieffer';
$utilisateur->prenom = 'mateo';
$utilisateur->adresse = '1 rue du fort de Kehl 54700 Maidieres';
$utilisateur->datenaiss = '1998-02-16';
$utilisateur->numtel = '0778701768';
$utilisateur->save();

$utilisateur2 = new User();
$utilisateur2->email = "fabricemougenot@caramail.com";
$utilisateur2->nom = "mougenot";
$utilisateur2->prenom = "fabrice";
$utilisateur2->adresse="15 rue du Puit 89000 Limoges";
$utilisateur2->datenaiss = "1956-05-05";
$utilisateur2->numtel="0689123450";
$utilisateur2->save();


$com = new Commentary();
$com->id =1;
$com->titre="Bien";
$com->contenu="Bonjour, j'ai grandement apprécié ce jeu: je le recommande.";
$com->date="2021-03-24";
$com->created_at = "2021-03-24";
$com->updated_at = "2021-03-24";
$com->email="mateokieffer@wanadoo.fr";
$com->game_id="12342";
$com->save();

$com2 = new Commentary();
$com2->id =2;
$com2->titre="Nul !";
$com2->contenu="Assez mauvais, je me suis ennuyé.";
$com2->date="2021-03-24";
$com2->created_at = "2021-03-24";
$com2->updated_at = "2021-03-24";
$com2->email="mateokieffer@wanadoo.fr";
$com2->game_id="12342";
$com2->save();


$com3 = new Commentary();
$com3->id =3;
$com3->titre="Moyen, à voir";
$com3->contenu="Très moyen.";
$com3->date="2021-03-24";
$com3->created_at = "2021-03-24";
$com3->updated_at = "2021-03-24";
$com3->email="mateokieffer@wanadoo.fr";
$com3->game_id="12342";
$com3->save();

$com4 = new Commentary();
$com4->id =4;
$com4->titre="C'est génial";
$com4->contenu="C'est le meilleur jeu auquel j'ai joué de toute ma vie";
$com4->date="2021-03-24";
$com4->created_at = "2021-03-24";
$com4->updated_at = "2021-03-24";
$com4->email="fabricemougenot@caramail.com";
$com4->game_id="12342";
$com4->save();

$com5 = new Commentary();
$com5->id =5;
$com5->titre="Passez votre chemin";
$com5->contenu="Passez votre chemin, ne jouez pas à ce jeu, c'est catastrophique";
$com5->date="2021-03-24";
$com5->created_at = "2021-03-24";
$com5->updated_at = "2021-03-24";
$com5->email="fabricemougenot@caramail.com";
$com5->game_id="12342";
$com5->save();

$com6 = new Commentary();
$com6->id =6;
$com6->titre="Franchement nul";
$com6->contenu="C'est trop nul !! N'y jouez pas";
$com6->date="2021-03-24";
$com6->created_at = "2021-03-24";
$com6->updated_at = "2021-03-24";
$com6->email="fabricemougenot@caramail.com";
$com6->game_id="12342";
$com6->save();