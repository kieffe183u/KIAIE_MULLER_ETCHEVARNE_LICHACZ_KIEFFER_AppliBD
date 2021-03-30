<?php

namespace gamepedia\controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Slim\Http\Request as Request;
use Slim\Http\Response as Response;

class Game
{
    public function showGame(Request $rq, Response $rs, array $args): Response
    {
        $id = $args['id'];

        try {
            $game = \gamepedia\modele\Game::select("id","name","alias","deck","description","original_release_date")->where('id', '=', $id)->firstOrFail();
            $tmp = json_encode($game, JSON_FORCE_OBJECT);
            $rs = $rs->withHeader("Content-Type", "application/json");
            $rs->getBody()->write($tmp);
        } catch (ModelNotFoundException $e){
            $rs = $rs->withHeader("Content-Type", "text/html");
            $rs->getBody()->write("<h1>Error 404</h1> Modele not found");
            $rs = $rs->withStatus(404,"Modele not found gros bg");
        }

        return $rs;
    }

    public function showAllGames(Request $rq, Response $rs, array $args): Response {
        $page = $_GET["page"];

        if (isset($page)){
            $games = \gamepedia\modele\Game::select("id","name","alias","deck")->skip(200 * (page - 1))->take(200)->get();
        } else {
            $games = \gamepedia\modele\Game::select("id","name","alias","deck")->take(200)->get();
        }
        foreach ($games as $game){
            $game["links"] = ["self" => ["href" => "api/games/".strval($game->id)]];
        }

        $form["games"] = $games;
        if (isset($page)){
            if ($page == 0){
                $form["links"] = ["prev" => ["href" => "api/games/?=" . strval($page)], "next" => ["href" => "api/games/?=" . strval($page + 1)]];
            } else if($page == 239){
                $form["links"] = ["prev" => ["href" => "api/games/?=" . strval($page - 1)], "next" => ["href" => "api/games/?=" . strval($page)]];
            } else {
            $form["links"] = ["prev" => ["href" => "api/games/?=" . strval($page - 1)], "next" => ["href" => "api/games/?=" . strval($page + 1)]];
            }
        }

        $tmp = json_encode($form, JSON_FORCE_OBJECT);
        $rs = $rs->withHeader("Content-Type", "application/json");
        $rs->getBody()->write($tmp);
        return $rs;
    }

}