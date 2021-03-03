# APPLICATION BASE DE DONNEES
* Léo MULLER
* Hugo ETCHEVARNE
* Charlie KIEFFER
* Sarah LICHACZ 
* Darius KIAÏE

_SI-2_

#TD1 :

##Partie 1 : 

1.1 Voir le fichier PDF présent dans le dossier TD1

1.2 Vous pouvez trouver ci-joint le modèle relationnel correspondant

Genre(**id_genre**, genre, description_courte, description_longue,)

Jeux (**id_jeux**, nom, description_longue, description_courte, date_sortie_initiale, date_sortie_attendue)

APourTheme (_**id_theme**_, _**id_jeux**_)

APourGenre (_**id_genre**_, _**id_jeux**_)

Theme (**id_theme**, theme)

Plateforme (**nomPlat**, alias, descriptionCourte, descriptionLongue, dateSortie, tarif, decompte,_nomCompagnie_)

Fonctionne (_**nomPlat**_, _**id_jeux**_)

Personnage (**nomPers**, alias, nom_reel, nom_famille, date_naissance, desc_courte, desc_longue, genre)

Organisme_Classification (**nomOrg**, descCourte, descLongue)

Compagnie (**nomCompagnie**, alias, abreviation, desc_courte, desc_longue, adresse, date_creation, num_tel, url_web)

ami (_**nom**_)

ennemi (_**nom**_)

Classement (**label**,_nomOrg_)

Correspond(_**id_jeux**_,_**label**_)

MisEnligne(_**nomCompagnie**_,_**id_jeux**_)

DevelopperPar(_**nomCompagnie**_,_**id_jeux**_))
