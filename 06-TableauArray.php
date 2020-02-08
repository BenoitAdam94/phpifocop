
echo '<h2>Tableaux de données array</h2>';

// déclaration d'un tableau array

$liste = array('jaune', 'rouge', 'bleu', 'vert');

//2 outils d'affichage amélioré : print_r() & var_dump()


echo 'Affichage avec print_r</br>';
echo '<pre>'; print_r($liste); echo '</pre>';

echo 'Affichage avec var_dump</br>';
echo '<pre>'; var_dump($liste); echo '</pre>';


//afficher bleu

echo "<pre> $liste[2] </pre>";

// foreach();
foreach($liste AS $valeur) {
    echo '- ' . $valeur . '<br>';
}

foreach($liste AS $ind => $val) {
    echo '- ' . $ind . ' : ' . $val . '<br>';
}

// autre façon de délarer un tableau array
$liste_pays[] = 'France';
$liste_pays[] = 'Espagne';
$liste_pays[] = 'Italie';
echo '<pre>'; var_dump($liste_pays); echo '</pre>';

//afichage
echo "$liste_pays[2] <br>";

// modification
$liste_pays[2] = 'Italie';
echo '<pre>'; var_dump($liste_pays); echo '</pre>';

// avec une boucle for() {
$taille_tableau = count($liste_pays); // count() renvoie le nomdbre element dans le tableau
$taille_tableau = sizeof($liste_pays);

echo "Il y a $taille_tableau element dans notre tableau<br>";

for($i = 0; $i < $taille_tableau; $i++) {
    echo "$liste_pays[$i] <br>";
}

$utilisateur = array('pseudo' => 'test', 'nom' => 'Durand', 'prenom' => 'David', 'age' => 35);
    echo '<pre>'; var_dump($utilisateur); echo '</pre>';
    echo $utilisateur['nom'] . '<br>';

$utilisateur['email'] = 'mail@mail.fr';
    echo '<pre>'; var_dump($utilisateur); echo '</pre>';