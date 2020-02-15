<?php
if(isset($_GET['langue'])) {
	// choix utilisateur
	$langue = $_GET['langue'];
} elseif(isset($_COOKIE['langue'])) {
	// l'utilisateur est déjà venu sur notre site on récupère la langue dans ses cookies
	$langue = $_COOKIE['langue'];
} else {
	// cas par défaut
	$langue = 'fr';
}

// on génére un cookie sur le poste utilisateur.
$un_an = 365*24*3600; // le nombre de seconde dans une année.
$duree_de_vie = time() + $un_an;
setCookie('langue', $langue, $duree_de_vie);
// setCookie('le_nom_du_cookie', 'sa_valeur', 'sa_duree_de_vie');

// Superglobale $_COOKIE contenant les cookies liés au serveur sur lequel on se trouve.
echo '<pre>'; var_dump($_COOKIE); echo '</pre>';


$message = '';
if($langue == 'fr') {
	
	$message = '<b>Bonjour</b>, <br>Vous visitez le site dans la langue française<br>';
	
} elseif($langue == 'en') {
	
	$message = '<b>Hello</b>, <br>Vous visitez le site dans la langue anglaise<br>';
	
} elseif($langue == 'es') {
	
	$message = '<b>Hola</b>, <br>Vous visitez le site dans la langue espagnole<br>';
	
} elseif($langue == 'it') {
	
	$message = '<b>Ciao</b>, <br>Vous visitez le site dans la langue italienne<br>';
	
} else {
	$message = 'Langue inconnue<br>';
}


// superglobale $_SERVER
// il est possible de récupérer la langue du navigateur
// echo '<pre>'; var_dump($_SERVER); echo '</pre>';
echo substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) . '<br>';


?>

<h1>Choisissez une langue</h1>
<?php 
	echo $message . '<hr>'; 
	echo 'Timestamp : ' . time() . '<hr>';
?>
<ul>
	<li><a href="?langue=fr">Français</a></li>
	<li><a href="?langue=en">Anglais</a></li>
	<li><a href="?langue=es">Espagnol</a></li>
	<li><a href="?langue=it">Italien</a></li>
</ul>