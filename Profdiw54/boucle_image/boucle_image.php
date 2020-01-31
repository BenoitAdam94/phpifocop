<?php

// 1 - récupérer 5 images en les rennomant de cette manière :
// image1.jpg image2.jpg image3.jpg image4.jpg image5.jpg 
// 2 - Afficher une image avec un echo <img src="">
// 3 - Afficher 5 fois l'image1 avec un seul <img src=""> (boucle)
// 4 - Afficher les 5 images avec un seul <img src=""> (boucle)

echo '<img src="image1.jpg" width="300" >';

echo '<hr>';

for($i = 0; $i < 5; $i++) {
	echo '<img src="image1.jpg" width="300" >';
}

echo '<hr>';

for($i = 1; $i <= 5; $i++) {
	echo '<img src="image' . $i . '.jpg" width="300" >';
}

echo '<hr>';

// en mettant les images dans un tableau array
$images = array('image1.jpg', 'image2.jpg', 'image3.jpg', 'image4.jpg', 'image5.jpg');
echo '<pre>'; var_dump($images); echo '</pre>';

foreach($images AS $ligne) {
	echo '<img src="' . $ligne . '" width="300" >';
}
echo '<hr>';
// rand() est une fonction prédéfinie permettant de renvoyer un entier aléatoire compris entre 2 entiers fournis en argument.
echo rand(1, 5);
echo '<hr>';
echo '<img src="image' . rand(1, 5) . '.jpg" width="300" >';
echo '<hr>';
echo '<img src="' . $images[rand(0, 4)] . '" width="300" >';









echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';



