<style>
h2 { padding:20px; background-color:#333; color: white; }
.rouge { color:red; }
.bleu { color:blue; }
.gray { color:gray; }
</style>
<h2>Ecriture & Affichage</h2>

<?php 

$debug = 0;
include 'zz-function-tools.php';

// commentaire
/* commentaire
multi-lignes */
# commentaire également
?>

<?php

// SOMMAIRE
// - Instruction d'affichage
// - Variables : Types /déclaration / Affectation
// - Concatenation
// - Guillements & apostrophe
// - Const
// - Comparaison COnditions
// - Fonctions predefinies
// - Fonctions utilisateur
// - Boucles
// - Inclusion
// - Array
// - Classes & objets

// - Instruction d'affichage

echo 'Bonjour';
echo '<br>';
print '<hr>';
echo '<h2>commentaires</h2>';
?>
<?= 'Balise pour generer un affichage'; ?>

<?php
echo '<h2>variables</h2>';
// signe dollar
// Char autorisé : a-z A-Z 0-9 _

$a = 127;
echo gettype($a); // integer
echo '<br>';
$a = 1.5;
echo gettype($a); // double
echo '<br>';
$a = 'en';
echo gettype($a); // string
echo '<br>';
$a = '127';
echo gettype($a); // string
echo '<br>';
$c = true; // TRUE true FALSE false
echo gettype($c); // boolean
echo '<br>';

echo '<h2> concatenation</h2>';
// avec le point "."

$x = 'Bonjour';
$y = 'tlm';
echo $x . ' ' . $y . '<br>';

echo "$x $y <br>";
// dans des guillement les variables sont reconnues

echo $x , ' ' , $y , '<br>';

$prenom2 = 'Bruno';
$prenom2 .= 'Marie';

// équivaut a écrire : $prenom2 = $prenom2 . 'Marie';
echo $prenom2 . '<br>'; // affiche Bruno Marie

echo '<h2>Constantes & Constantes magiques</h2>';

// Par convention = majuscule

define("CAPITALE",'Paris');
// appel de la constante
echo CAPITALE . '<br>';


echo __FILE__ . '<br>';
echo __LINE__ . '<br>';
echo __FUNCTION__ . '<br>';
echo __CLASS__ . '<br>';
echo __METHOD__ . '<br>';

// Exercice : '<h2>Exo variable</h2>';

$bleu = 'Bleu';
$blanc = 'Blanc';
$rouge = 'Rouge';
$t = '-';
$spanbleu = '<span class="bleu">';
$spanrouge = '<span class="rouge">';
$spanblanc = '<span class="gray">';
$spanfin = '</span>';
echo $spanbleu . $bleu . $spanfin. $t .
     $spanblanc . $blanc . $spanfin. $t .
     $spanrouge . $rouge . $spanfin;
echo '<br>';
echo "$spanbleu$bleu$spanfin$t$spanblanc$blanc$spanfin$t$spanrouge$rouge$spanfin";
     


echo '<h2>Mathematiques</h2>';

$a = 10;
$b = 2;
echo $a + $b . '<br>'; // affiche 12
echo $a - $b . '<br>'; // affiche 8
echo $a * $b . '<br>'; // affiche 20
echo $a / $b . '<br>'; // affiche 5

// modulo (restant de la division en entier)
echo $a % $b . '<br>';

// Racourci

$a += $b; 
$a -= $b; 
$a *= $b; 
$a /= $b; 
$a %= $b; 

echo '<h2>IF ELSE ELSIF</h2>';

$var1 = 0; // ou '' ou false

if(isset($var1)) {
    echo 'La viatable var1 existe <br>';
    }
    else {
        echo 'La variable var1 n\'existe pas <br>';
    }

if(empty($var1)) {
    echo 'La variable var1 n\'existe pas <br>';
    }
    else {
        echo 'La variable var1 existe <br>';
    }
// if /elsif / else
$a = 10; $b = 5; $c = 2;

if ($a > $b) {
    //si la valeur de a est strictement supérieure à b
    echo 'a est bien supérieur à b<br>';
} else {
    echo 'a n\'est pas supérieur à b<br>';
}

if ($a > $b) :
    //si la valeur de a est strictement supérieure à b
    echo 'a est bien supérieur à b<br>';
else :
    echo 'a n\'est pas supérieur à b<br>';
endif;

// Uniquement si une seule instruction

if ($a > $b)
    //si la valeur de a est strictement supérieure à b
    echo '$a est bien supérieur à b<br>';
else
    echo '$a n\'est pas supérieur à b<br>';

// Plusieurs conditions obligatoires =>> &&
$a = 10; $b = 5; $c = 2;
if($a > $b && $b > $c) {
    echo 'Ok pour les deux conditions<br>';
}

if($a > 20 || $b > $c) {
    echo 'Ok pour au moins une des deux conditions<br>';
}
else {
    echo 'Aucune de ces deux conditions n\'est vraie';
}

$a = 10;
if($a == 8) {
    echo 'Reponse 1';
}

// autre façon d'écrire une condition : Forme contractée : ternaire

echo ($a == 10) ? 'la valeur de a est 10' : 'la valeur de a est differente de 10';

if($a == 10) {
    echo 'la valeur de a est 10';
} else {
    echo 'La vleur de a est différente de 10';
}

// Opérateur de comparaison
$a = 1;
$b = '1';

if($a == $b) {
    echo 'la variable a et la variable b ont la même valeur<br>';
}

if($a == $b) {
    echo 'la variable a et la variable b ont la même valeur et le même type<br>';
} else {
    echo 'a et b ont soit une valeur differente soit un type different<br>';
}

/*

    = affectation d'une valeur
    == comparaison des valeurs uniquement
    != 
    === Comparaison des valeurs et des types
    !== Différent en terme de valeur et/ou de type(comparaison stricte)
    >
    <
    >=
    <=
*/

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

// Creation d'un fichier exemple.inc.php
echo '<h2>Inclusion</h2>';

include 'exemple.inc.php';

echo '<br>';

include_once 'exemple.inc.php';

// require
// require_once

// bloque l'execution

separateur();

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

echo '<h2>Les classes et les objets</h2>';

// Une classe est un modèle de construction
// Un objet est issu d'une classe (c'est une instance de la classe)
// Un objet est un conteneur virtuel permeetant de conserver un ensemble d'informations (appellées propriété ou atrribut de l'objet) mais aussi des fonctions (appellées méthode de l'objet)

class Etudiant
{
    // propriété
    public $prenom = 'Marie';
    public $mail = 'marie@mail.fr';
    public $age = '32';

    // le mot clé public permet de précise que l'on peut appeller l'info directement sur l'objet généré sinon il faudrait passer par des méthodes (fonctions) prévues pour modifier ou récupérer l'information
    // il existe d'autres possibilités notamment protected / private

    // méthode
    public function pays() {
        return 'France';
    }
}

// pour instancier un objet depuis la classe :
$objet1 = new Etudiant() ;
$objet2 = new Etudiant() ;
dump($objet1);
dump($objet2);

// pour voir les méthodes d'un objet

dump($objet1);
dump(get_class_methods($objet1));

// pour récupérer une information ou une methode d'un objet

echo $objet1->prenom . '<br>';
echo $objet1 -> mail . '<br>';
echo $objet1 -> age . "<hr>";
// la methode
echo $objet1 -> pays() . '<hr>';


// il est possible de modifier les propriétés :
$objet1 -> age = 33;
echo $objet1 -> age . '<hr>';
echo $objet2 -> age . '<hr>';

// dans un tableau array on appelle une information avec les crochets []
// dans un objet avec la fleche ->




?>


