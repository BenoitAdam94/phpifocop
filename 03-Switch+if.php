<?php


echo '<h2>Condition Switch()</h2>';

$couleur = 'jaune';

switch($couleur) {
    case 'bleu' :
        echo 'Vous aimez le bleu<br>';
    break;
    case 'vert' :
        echo 'Vous aimez le vert<br>';
    break;
    default :
        echo 'Vous n\'aimez rien !<br>';
}

if($couleur == 'bleu') {
    echo 'vous aimez le bleu<br>';
    } else if ($couleur == 'vert') {
        echo 'Vous aimez le vert<br>';
    } else {
        echo 'Vous n\'aimez rien !<br>';
}
?>