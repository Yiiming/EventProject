<?php

//Faker pour insérer des données
require_once("Faker/src/autoload.php");

try{
	$bdd = new PDO('mysql:host=localhost;dbname=eventproject', 'root', '');
} catch (Exception $e) {
	echo $e->getMessage()."\n";
	die('Erreur : ' . $e->getMessage());
}
$ligne = 0;
$faker = Faker\Factory::create('fr_FR');
$subscribe = $bdd->prepare("INSERT INTO RESERVATION(ID, CIVILITE, NOM, PRENOM, MAIL, BIRTH, ADRESSE, CP, VILLE, TELEPHONE, CAMP, ARTEFACT, ETAT, DATE_CREATION) VALUES (NULL, :CIVILITE, :NOM, :PRENOM, :MAIL, :BIRTH, :ADRESSE, :CP, :VILLE, :TELEPHONE, :CAMP, :ARTEFACT, :ETAT, :DATE_CREATION)");
for ($i = 0; $i < 50; $i++){
	$random = mt_rand(0,1);
	if($random == 1){
		$title = htmlspecialchars("homme");
	}else{
		$title = htmlspecialchars("femme");
	}
	
	$mail = htmlentities(utf8_encode($faker->email));
	$firstname = htmlentities(utf8_encode($faker->firstname));
	$lastname = htmlentities(utf8_encode($faker->lastname));
	$date = htmlentities(utf8_encode($faker->dateTimeThisCentury->format('Y-m-d')));
	$streetAddress = htmlentities(utf8_encode($faker->streetAddress));
	$postcode = htmlentities(utf8_encode($faker->postcode));
	$city = htmlentities(utf8_encode($faker->city));
	$phoneNumber = htmlentities(utf8_encode($faker->phoneNumber));
	$camp = (int)htmlentities(utf8_encode(mt_rand(1,5)));
	$artefact = (int)htmlentities(utf8_encode(mt_rand(1,6)));
	$etat = (int)htmlentities(utf8_encode(mt_rand(1,3)));
	$date_creation = htmlentities(utf8_encode("2017-12-28 15:46:25"));

	$subscribe->execute(array(
		"CIVILITE" => $title,
		"NOM" => $lastname,
		"PRENOM" => $firstname,
		"MAIL" => $mail,
		"BIRTH" => "2017-12-28", 
		"ADRESSE" => $streetAddress,
		"CP" => $postcode,
		"VILLE" => $city, 
		"TELEPHONE" => $phoneNumber,
		"CAMP" => $camp,
		"ARTEFACT" => $artefact, 
		"ETAT" => $etat,
		"DATE_CREATION" => $date_creation 
	));
	$ligne++;
}
echo "insertion de " . $ligne . " de lignes dans la table RESERVATION";

?>