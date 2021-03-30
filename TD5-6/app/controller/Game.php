<?php

namespace gamepedia\controller;
use Slim\Http\Request as Request;
use Slim\Http\Response as Response;

class Game
{
    public function showGame(Request $rq, Response $rs, array $args): Response
    {
        $id = $args['id'];
        try {
            $game = \gamepedia\modele\Game::select("")->where('id', '=', $id)->firstOrFail();

            $tmp = json_encode($game, JSON_FORCE_OBJECT);
            $rs = $rs->getBody()->write("<h1>".$tmp."</h1>");
            $rs = $rs->withHeader("Content-Type", "application/json");
        } catch (Exception $e){
            $rs = $rs->withStatus(404,"Modele not found gros bg");
        }

        return $rs;
    }

}