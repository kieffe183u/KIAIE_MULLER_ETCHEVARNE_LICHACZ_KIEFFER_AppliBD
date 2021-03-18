# APPLICATION BASE DE DONNEES
* Léo MULLER
* Hugo ETCHEVARNE
* Charlie KIEFFER
* Sarah LICHACZ 
* Darius KIAÏE

_SI-2_

# Préparation TD3 :

Partie 1 : 

1.  time.php


//Calculer le temps d'execution d'une séquence d'instructions
 
//relever le point de départ

$timestart=microtime(true);
 

//Execution du code PHP:
//génération du code HTML ...
 
//Calcul du temps total

$timeend=microtime(true);

$time = $timeend - $timestart;
 
//affichage du temps

echo "la durée d'execution est de ".$time." secondes <br>";

2. Lorsque nous faisons une recherche précise dans des tables avec un volume de données important, il faut parcourir l'entiereté des lignes de la table. L'index va permettre d'accélérer ce processus de recherche, notamment par le tri des données indexées. Par exemple pour rechercher une personne grâce à son nom et son prénom, nous allons procéder par dichotomie et donc gagner beaucoup de temps.

Partie 2 : 

1. Question 1

De la forme :
- Nom de la requete
- Requete
- Paramètres

2. Le problème des N+1 query engendre une baisse des performances. 
Cela est lié aux relations de type parent-enfant. On exécute une requête pour obtenir la relation parente puis on doit récupérer un à un les enfants.

Exemple: on a 10 auteurs et on veut récupérer les livres écrits par chacun de ces 10 auteurs. 
On va devoir exécuter UNE première requête pour récupérer les 10 auteurs puis exécuter ensuite 10 requêtes pour 
retourner les livres de chacun des auteurs (10 requêtes donc, d'où le 10 + 1, d'où le N+1).





