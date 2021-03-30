<?php

namespace gamepedia\controller;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class Game
{


    public function showGame(Request $rq, Response $rs, array $args): Response
    {
        $id = $args['id'];
        try {
        $game = \gamepedia\modele\Game::select("")->where('id', '=', $id)->firstOrFail();

        $tmp = json_encode($game, JSON_FORCE_OBJECT);
            $rs = $rs->write("<h1>".$tmp."</h1>");
            $rs = $rs->withHeader("Content-Type", "application/json");
        } catch (ModelNotFoundException){
            $rs = $rs->withStatus(404,"Modele not found gros bg");
        }
        return $rs;
    }

}