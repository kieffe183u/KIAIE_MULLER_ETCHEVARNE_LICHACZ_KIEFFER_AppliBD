<?php


namespace gamepedia\controller;


use Slim\Http\Request as Request;
use Slim\Http\Response as Response;

class Commentary
{

    public function showComments(Request $rq, Response $rs, array $args): Response {
        $id = $args['id'];

        $comments = \gamepedia\modele\Commentary::select("id","titre","contenu","created_at","email")->where('game_id','=',$id)->get();
        $tmp = json_encode($comments, JSON_PRETTY_PRINT);
        $rs = $rs->withHeader("Content-Type", "application/json");
        $rs->getBody()->write($tmp);

        return $rs;
    }

}