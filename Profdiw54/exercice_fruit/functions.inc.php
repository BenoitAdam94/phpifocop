<?php
// functions.inc.php
// appel.php

function calcul($fruit, $poids) {
	
	$fruit = strtolower($fruit);
	// strtolower() permet de passer une chaine en minuscule
	
	switch($fruit) {
		case 'cerises' : $prix_kg = 5.76; break;
		case 'pommes' : $prix_kg = 2.24; break;
		case 'bananes' : $prix_kg = 3.07; break;
		case 'peches' : $prix_kg = 4.10; break;
		default : return 'Fruit inconnu<br>'; break;
	}
	
	$resultat = round(($poids*$prix_kg/1000), 2);
	// le poids sera en grammes donc /1000 car le prix est au kilo
	
	return 'Les ' . $fruit . ' coutent ' . $resultat . ' € pour ' . $poids . ' grammes<br>'; 	
	
}
















