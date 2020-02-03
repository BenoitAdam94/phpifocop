<?php

function dump($ddump) {
    echo '<pre>';
    var_dump($ddump);
    echo '</pre>';
}

session_start(); // ouverture de session et creatio nd'un cookie

$_SESSION['login'] = 'admin';
$_SESSION['password'] = '12345';
$_SESSION['email'] = 'admin@mail.fr';
$_SESSION['adresse'] = '1 rue de Paris';

echo '<b>Premier Affichage de la session</b> : <br>';
dump($_SESSION);


// Pour enlever un élement du tableau ARRAY :
unset($_SESSION['password']);

echo '<b>Deuxième Affichage de la session</b> : <br>';
dump($_SESSION);

//pour supprimer une session
// unset($_SESSION); // suppression immédiate
session_destroy();

echo '<b>Troisième Affichage de la session</b> : <br>';
dump($_SESSION);
