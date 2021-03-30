# PREPARATION SEANCE 5 ET 6 

1) - Retourne un tableau quand aucun paramètre supplémentaire n'est ajouté
   - Retourne un objet quand le paramètre "JSON_FORCE_OBJECT" est ajouté à l'appel de la fonction

2) - $uri = $request->getUri();
   - $method = $request->getMethod();
   
3) - $response->withStatus(302);
   - $newResponse = $oldResponse->withHeader('Content-type', 'application/json');
