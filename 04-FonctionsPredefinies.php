<?php

echo '<h2>Fonction Prédéfinie</h2>';

echo '<b>Date : </b><br>';
echo date('d/m/Y à H:i:s') . '<br>';


$email = 'manager@spiralstatic.eu';
echo strpos($email, '@') . '<br>';
// On recupere 7


$email2 = 'Bonjour';
echo strpos($email2, '@') . '<br>';
// On recupere false


echo '<pre>' ;
var_dump(strpos($email2, '@'));
echo '</pre>';

echo '<pre>';
var_dump(strpos($email2, '@'));
echo '</pre>';

$phrase = 'Lorem Ipsum';
echo strlen($phrase) . '<br>'; // affiche 11 

//1 caracete = 1 octet sauf charactères speciaux
// Pour la prise en compte charactère spéciaux : iconv_strlen()
// iconv_strlen() compte la taille d'une chaine de terme de char et pas d'octet 

// exemple :
echo strlen('€') . '<br>';
echo iconv_strlen('€') . '<br>';
/*
    succes : un entier (int)
    Echec : 0   
*/

// substr
$texte = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis accusantium ullam deserunt officia aliquam dicta voluptatem excepturi cupiditate vel labore? Aspernatur rem, non voluptates distinctio fugit impedit suscipit at? Neque?";
echo substr($texte, 0, 20) . '...<a href="">Lire la suite</a>';
// substr(la_chaine_a_couper_, position_de_depart, nombre_de_caractère_à_renvoyer)

// iconv_substr() // pour la prise en charge des caractères spéciaux

echo '<h2>Fonctions utilisateurs</h2>';
// fonction déclarée et executée par le développeur

// déclaration d'une fonction permettant d'afficher 3 hr dans la page
function separateur() {
    echo '<hr><hr><hr>';
}

// exécution :
separateur();

// fonction avec argument : les arguments sont des paramètres fournis à la fonction permettant de compléter ou modifier un traitement.
function bonjour($qui) {
    return 'Bonjour <b> ' . $qui . '</b><br>';
    // la ligne suivante ne sra pas executé
    echo 'TEST';

}
// avec un return, l'information est renvoyée, si l'on veut un affichage, à nous de mettre echo
echo bonjour('Marie');
$pseudo = 'Mathieu';
echo bonjour($pseudo);

function applique_tva($valeur) {
    return $valeur * 1.2;
}

echo '1000€ avec 20% de tva font : ' . applique_tva(1000) . '€ TTC <br>';

echo '3569€ avec 20% de tva font : ' . applique_tva(3569) . '€ TTC <br>';

// Faire une fonction similaire mais permettant à l'utilisateur de choisir le taux de tva

function tva($valeur, $taux) {
    switch ($taux){
    case 5.5 :
        return $valeur * 1.055;
        break;
    case 10 :
        return $valeur * 1.10;
        break;
    case 20 :
        return $valeur * 1.20;
        break;
    default:
    echo "ERREUR";
    return $valeur = 0;
    }
}

function tva_prof($valeur, $taux) {
    return $valeur * $taux;
}

echo '1000€ avec 5% de tva font : ' . tva(1000, 5) . '€ TTC <br>';


echo '1000€ avec 20% de tva font : ' . tva_prof(1000, 20) . '€ TTC <br>';

separateur();

meteo('hiver', 0);

function meteo($saison, $temperature) {
    echo 'Nous sommes en ' . $saison . ' et il fait ' . $temperature . 'degrés<br>';
}

function exo_meteo ($saison, $temperature) {
    $pronom ='en';
    $pluriel = '';
    if ($saison == 'printemps') { $pronom = 'au'; }
    if ($temperature > 1 || $temperature < -1) { $pluriel = 's'; }
    echo "Nous sommes $pronom $saison et il fait $temperature degré$pluriel <br>";
}

separateur();

echo ($a == 10) ? 'la valeur de a est 10' : 'la valeur de a est differente de 10';

separateur();

function exo_meteo2 ($saison, $temperature) {
    ($saison == 'printemps') ? $pronom = 'au' : $pronom = 'en';
    ($temperature > 1 || $temperature < -1) ? $pluriel = 's': $pluriel = '';
    echo 'Nous sommes ' . $pronom . ' ' . $saison . ' et il fait ' . $temperature . ' degré' . $pluriel . ' <br>';
}

separateur();

exo_meteo('hiver', -5);
exo_meteo('printemps', 14);
exo_meteo('ete', 20);
exo_meteo('automne', 1);

separateur();

exo_meteo2('hiver', -5);
exo_meteo2('printemps', 14);
exo_meteo2('ete', 20);
exo_meteo2('automne', 1);


// la portée des variables (scope)
// global & local

function jour_semaine() {
    $jour = "jeudi";
    return $jour;
}

echo $jour . '<br>';

$jour = jour_semaine();
echo $jour . '<br>';

// Espace Global
$pays = 'France';
function affichage_pays() {
    global $pays; 
 }

 affichage_pays();

 echo '<h2>Structure itérative : les boucles</h2>';

 
// while() []

$i = 0; // valeur de départ

while ($i < 10) {
    echo $i . ' - ';
    $i++;
}

separateur();

// amelioration

$i = 0;

while ($i < 10) {
    if ($i < 9) {
        echo $i . ' - ';
        }
    else {
        echo $i;
    }
    $i++;
}

separateur();

$i = 0;

while ($i < 9) {
    echo $i . ' - ';
    $i++;
    if ($i >= 9) {
        echo $i;
        }
}

// Boucle FOR

// for(valeur_de_depart;condition_dentree;incrementation);

for($i = 0; $i <10; $i++){
    echo $i;
}

for($i = date('Y'); $i > 1930; $i--) {
    echo "<option> $i </options>";
}
?>

<table style="border-collapse: collapse; width: 50%; margin: 0 auto;" border="1">
<tr>
    <?php
for($i = 0; $i <10; $i++){
    echo "<td> $i </td>";
}
?>
</tr>
</table>

<?php
separateur();
?>
<table style="border-collapse: collapse; width: 50%; margin: 0 auto;" border="1">

    <?php

$x = 0;
for($y = 0; $y <10; $y++) {
    echo "<tr>";
    for($i = 0; $i <10; $i++){
        echo "<td> $x </td>";
        $x++;
    }
     echo "</tr>";
}

?>
</tr>
</table>

<?php

?>