<?php


namespace gamepedia\controller;


use Slim\Http\Request as Request;
use Slim\Http\Response as Response;

class Platform
{
    public function showDescription(Request $rq, Response $rs, array $args): Response {
        $id = $args['id'];

        $desc = \gamepedia\modele\Platform::select("description")->where("id",'=',$id)->get();
        $form["platform"]["id"] = $id;
        $form["platform"]["description"] = $desc[0]["description"];

        $rs = $rs->withHeader("Content-Type", "application/json");
        $rs->getBody()->write(json_encode($form, JSON_PRETTY_PRINT));

        return $rs;
    }
}