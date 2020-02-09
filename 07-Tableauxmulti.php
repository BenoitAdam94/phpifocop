<?php

$debug = 0;
include 'tools.php';

echo '<h2>Tableaux multidimensionnel</h2>';

$tab_multi = array (
                0 => array('prenom' => 'Marie', 'mail' => 'marie@mail.fr', 'age' => 32),
                1 => array('prenom' => 'Piers', 'mail' => 'piers@mail.fr', 'age' => 21),
                2 => array('prenom' => 'Frank', 'mail' => 'frank@mail.fr', 'age' => 40),
                    );


dump($tab_multi);
js("Je suis un log");

// on affiche toutes les infomations avec 2 foreach

echo '<ul>';
foreach($tab_multi AS $indice => $valeur) {
    echo '<li>' . $indice . '</li>';

    foreach($valeur AS $indice2 => $valeur2) {
        echo '<li>' . $indice2 . ' : ' . $valeur2 . '</li>';
    }
}
echo '</ul>';

// sans les balises ul li
foreach($tab_multi AS $indice => $valeur) {
    foreach($valeur AS $indice2 => $valeur2) {
        echo "- $indice2 : $valeur2 <br>";
    }
}
/*
// Avec FOR
$taille_tab_multi = count($tab_multi);
for($i = 0; $i < $taille_tab_multi; $i++) {
    echo "$tab_multi[$i]['prenom'] <br>";
}
*/




?>
