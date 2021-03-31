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

    public function showComment(Request $rq, Response $rs, array $args): Response {
        $id = $args['id'];
        $form["comment"] = [];
        $character = \gamepedia\modele\Commentary::all()->where("id","=",$id);
        $form["comment"] = $character;
        $tmp = json_encode($form, JSON_PRETTY_PRINT);
        $rs = $rs->withHeader("Content-Type", "application/json");
        $rs->getBody()->write($tmp);

        return $rs;
    }

    public function ajouterComment(Request $rq, Response $rs, array $args){
        $html = <<<FIN
<form method="POST" >
	<label>Titre:<br> <input type="text" name="titre"/></label><br>
	<label>ID du jeu:<br> <input type="time" name="gameid"/></label><br>
	<label>Contenu: <br><textarea type="text" name="contenu" rows="5" cols="33"></textarea></label><br>
    <Label>Date:<br><input type="date" name="date"/></Label><br>
    <label>Email:<br> <input type="text" name="titre"/></label><br>
    
	<button type="submit">Enregistrer le commentaire</button>
</form>	
FIN;
        $rs->getBody()->write($html);
    }

}