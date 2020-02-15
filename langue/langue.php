<?php

if(isset($_GET['langue'])) {
    $langue = $_GET['langue'];
} elseif(isset($_COOKIE['langue'])) {
    $langue = $_COOKIE['langue'];
}

else {
    // cas par défaut
    $langue = 'fr';
}

// FONCTION PERSO

function d_bug($nom){
    echo '<pre>';
    var_dump($nom);
    echo '</pre>';
}

// Debug

$debug = 1;

// COOKIE

$un_an = 365*24*3600; // nombre de secondes
$an1 = 31536000;
$an2 = 63072000;

$duree_de_vie = time() + $un_an;

setCookie('langue', $langue, (time() + $un_an));

if($debug == 1){
    d_bug($_COOKIE);
    d_bug($_SERVER);
    d_bug($_POST);
    d_bug($_GET);
    }



$message = '';
if($langue == 'fr') {
    $message = '<b>Bonjour</b>, <br> vous visitez le site dans la langue Française'; 
} else if($langue == 'en') {
    $message = '<b>Bonjour</b>, <br> vous visitez le site dans la langue Anglaise'; 
} else if($langue == 'es') {
    $message = '<b>Bonjour</b>, <br> vous visitez le site dans la langue Espagnole'; 
} else if($langue == 'it') {
    $message = '<b>Bonjour</b>, <br> vous visitez le site dans la langue Italienne'; 
} else {
    $message = 'Langue Inconnue';
}

// sharemycode.fr/643

echo substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) . '<br>';

?>



<h1>Choisissez une langue</h1>
<?php echo $message . '<hr>'; ?>
<ul>
    <li><a href="?langue=fr">Français</a></li>
    <li><a href="?langue=en">Anglais</a></li>
    <li><a href="?langue=es">Espagnol</a></li>
    <li><a href="?langue=it">Italien</a></li>
</ul>