<?php

include "../../model/Connexion.php";

$connect = new Connexion('127.0.0.1', 'root', '', 'eventProject');

session_start();

if(!isset($_SESSION['login'])){
	header('location:../frontoffice/index.php');
}

$page = 0;
if(isset($_GET["page"])){
	$page = (int)$_GET["page"];
}

$response = "";
$success = 0;

//On compte toutes les lignes de réservations
$nbrUser = $connect->requete("SELECT COUNT(*) FROM RESERVATION WHERE ETAT =".$etat);
//On va les compter et les stocker dans une variable
$count = $nbrUser->fetchColumn();
//On va définir le nombre de ligne qu'on souhaite avoir
$nbrLigne = (int)10;
//On va définir la ligne où l'on commence
$ligne = (int)$nbrLigne * $page;
//On arrondi la valeur à l'entier supérieur pour avoir un système de pagination 
$nbrPage = ceil($count/$nbrLigne);

$subscriber = $connect->searchUser($etat, $ligne, $nbrLigne);


?>