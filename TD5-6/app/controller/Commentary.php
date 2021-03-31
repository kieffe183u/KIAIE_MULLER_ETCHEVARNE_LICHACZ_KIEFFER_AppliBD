<?php


namespace gamepedia\controller;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Slim\Http\Request as Request;
use Slim\Http\Response as Response;

class Commentary
{

    public function showComments(Request $rq, Response $rs, array $args): Response
    {
        $id = $args['id'];

        $comments = \gamepedia\modele\Commentary::select("id", "titre", "contenu", "created_at", "email")->where('game_id', '=', $id)->get();
        $tmp = json_encode($comments, JSON_PRETTY_PRINT);
        $rs = $rs->withHeader("Content-Type", "application/json");
        $rs->getBody()->write($tmp);

        return $rs;
    }

    public function showComment(Request $rq, Response $rs, array $args): Response
    {
        $id = $args['id'];
        $form["comment"] = [];
        $character = \gamepedia\modele\Commentary::all()->where("id", "=", $id);
        $form["comment"] = $character;
        $tmp = json_encode($form, JSON_PRETTY_PRINT);
        $rs = $rs->withHeader("Content-Type", "application/json");
        $rs->getBody()->write($tmp);

        return $rs;
    }


    public function addComment(Request $rq, Response $rs, array $args): Response
    {
        try {
            $post = $rq->getParsedBody();

            $comment = new \gamepedia\modele\Commentary();
            $titre = filter_var($post['titre'], FILTER_SANITIZE_STRING);
            $contenu = filter_var($post['contenu'], FILTER_SANITIZE_STRING);
            $date = $post['date'];
            $created_at = date();
            $updated_at = date();
            $email = filter_var($post['email'], FILTER_SANITIZE_EMAIL);
            $game_id = filter_var($post['game_id'], FILTER_SANITIZE_STRING);
            $comment->titre = $titre;
            $comment->contenu = $contenu;
            $comment->date = $date;
            $comment->created_at = $created_at;
            $comment->updated_at = $updated_at;
            $comment->email = $email;
            $comment->game_id = $game_id;
            $comment->save();

            $tmp = json_encode($comment, JSON_PRETTY_PRINT);
            $rs = $rs->withStatus(201);
            $rs = $rs->withHeader("Content-Type", "application/json");
            $rs = $rs->withHeader("Location", " /api/comments/".$comment->id);
            $rs->getBody()->write($tmp);

            return $rs;

        } catch (Exception $e) {
            $rs = $rs->withStatus(404);

        }
    }

}