<?php
// Faire en sorte que la couleur sur le body change à chaque rafraichissement de page.
// rand() permet de récupérer un chiffre aléatoire entre 2 entiers fourni en argument.

$couleur = '';

/*
for($i = 0; $i < 6; $i++) {
	$couleur .= rand(0, 9);
}

echo $couleur;
*/
// pour avoir les lettres
$tab = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 'a', 'b', 'c', 'd', 'e', 'f');
echo '<pre>'; print_r($tab); echo '</pre>';


$couleur = '';
for($i = 0; $i < 6; $i++) {
	$couleur .= $tab[rand(0, 15)];
}
echo $couleur;
echo '<br>' . count($tab);
?>

<body style="background-color: #<?php echo $couleur; ?>"></body>




