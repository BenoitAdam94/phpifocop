<?php

function calcul ($fruits, $poids) {

    $fruits = strtolower($fruits);

    switch($fruits) {
        case 'cerises' : $prix_kg = 5.76; break;
        case 'pommes' : $prix_kg = 2.24; break;
        case 'bananes' : $prix_kg = 3.07; break;
        case 'peches' : $prix_kg = 4.10; break;
        default: return 'Fruit inconnu<br>';

        
    }

    $resultat = round (($poids*$prix_kg/1000), 2);

    return "les $fruits coutent $prix_kg € et pesent $poids";

    
}

?>