# APPLICATION BASE DE DONNEES
* Léo MULLER
* Hugo ETCHEVARNE
* Charlie KIEFFER
* Sarah LICHACZ 
* Darius KIAÏE

_SI-2_

# Préparation TD2 :

1. Le schéma SQL est présent dans le fichier en image

2. Les méthodes possibles sur Eloquent sont hasOne, belongsTo, hasMany, et d'autres moins courantes (tq hasManyThrough)
* Pour la table **Photo** il faut utiliser la méthode hasMany
* Pour la table **Annonce** comme nous sommes sur un cas de relation n:n et que l'on utilise une table d'associations (correspond selon le schéma) on peut utiliser la méthode belongsToMany

3.

    3.1 $photo = Photo::select('file')->where('AnnonceID','=', 22)->get();

    3.2 $photo_taille = Photo::select('file')->where('taille_octet','>', 1000000)->get();
	
	3.3 $count = Photo::select('AnnonceID')->count();
		$annonce = Photo::select('AnnonceID')->where($count, '>', 3);
		
	3.4 $annonce_taille = Photo::select('AnnonceID')->where('taille_octet', '>', 1000000)->get();
4.

