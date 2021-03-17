# APPLICATION BASE DE DONNEES
* Léo MULLER
* Hugo ETCHEVARNE
* Charlie KIEFFER
* Sarah LICHACZ 
* Darius KIAÏE

_SI-2_

# Préparation TD3 :

Partie 1 : 

1. 
<?php
/**
* Calculer le temps d'execution d'une séquence d'instructions
*/
 
// relever le point de départ
$timestart=microtime(true);
 
/**
* Execution du code PHP:
* - génération du code HTML ...
*/
 
//Calcul du temps total
$timeend=microtime(true);
$time=$timeend-$timestart;
 
//affichage du temps
echo "la durée d'execution est de $time secondes \n";
?>

2. Lorsque nous faisons une recherche précise dans des tables avec un volume de données important, il faut parcourir l'entiereté des lignes de la table. L'index va permettre d'accélérer ce processus de recherche, notamment par le tri des données indexées. Par exemple pour rechercher une personne grâce à son nom et son prénom, nous allons procéder par dichotomie et donc gagner beaucoup de temps.

Partie 2 : 

1.

2.





