<?php 
// get est un protocole HTTP
// l'outil php est une superglobale => $_GET
// les superglobales sont des tableaux array
// $_GET existe toujours  

echo '<pre>'; var_dump($_GET); echo '</pre>';

// Faire un affichage propre (echo) des informations présentes dans la superglobale $_GET

if(
	isset($_GET['article']) && 
	isset($_GET['couleur']) && 
	isset($_GET['quantite']) && 
	isset($_GET['prix'])
  ) {
	
	echo 'L\'article est : ' . $_GET['article'] . '<br>';
	echo 'La couleur est : ' . $_GET['couleur'] . '<br>';
	echo 'La quantité est : ' . $_GET['quantite'] . '<br>';
	echo 'Le prix est : ' . $_GET['prix'] . '<br>';
}

// syntaxe dans l'url pour passer des informations dans GET
// s'il y a un ? dans l'url, avant c'est l'adresse au sens propre, après le ? ceux sont des informations complémentaires que l'on peut récupérer dans $_GET
// ?indice1=valeur1&indice2=valeur2&indice3=valeur3....




echo '<hr>';
// avec un foreach()
foreach($_GET AS $i => $v) {
	echo ucfirst($i) . ' :' . $v . '<br>';
}
// ucfirst() est une fonction prédéfinie permetant de passer la première lettre en majuscule




?>
<h1 style="padding: 20px; background-color: red; color: white">Page 2</h1>

<a href="page1.php">Lien vers la page 1</a>
<?php



