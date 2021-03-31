<?php


namespace gamepedia\controller;


use Slim\Http\Request as Request;
use Slim\Http\Response as Response;

class Character
{

    public function showCharacters(Request $rq, Response $rs, array $args): Response {
        $id = $args['id'];
        $form["characters"] = [];
        $characters = \gamepedia\modele\Character::select("id","name")->join("game2character","id","character_id")->where("game_id",'=',$id)->get();
        for ($i  = 0 ; $i < count($characters); $i++){
            $tmpChar["character"] = $characters[$i];
            $tmpChar["links"] = ["self" => ["href" => "/api/character/".$characters[$i]->id.""]];
            $form["characters"][$i] = $tmpChar;
            $tmpChar = [];
        }
        $tmp = json_encode($form, JSON_PRETTY_PRINT);
        $rs = $rs->withHeader("Content-Type", "application/json");
        $rs->getBody()->write($tmp);

        return $rs;
    }

    public function showCharacter(Request $rq, Response $rs, array $args): Response {
        $id = $args['id'];
        $form["character"] = [];
        $character = \gamepedia\modele\Character::all()->where("id","=",$id);
        $form["character"] = $character;
        $tmp = json_encode($form, JSON_PRETTY_PRINT);
        $rs = $rs->withHeader("Content-Type", "application/json");
        $rs->getBody()->write($tmp);

        return $rs;
    }
}