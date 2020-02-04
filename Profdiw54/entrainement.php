<style>
h2 { padding: 20px; background-color: #333; color: white; }
</style>
<h2>Ecriture & affichage</h2>
<!-- Tout d'abord, il est possible d'écrire de l'html dans un fichier .php /!\ l'inverse n'est pas possible. --> 

<?php // balise d'ouverture php

// balise de fermeture :
?>

<?php
// Les bonnes pratiques de PHP :
// https://phptherightway.com/
// https://www.php-fig.org/psr/

// SOMMAIRE
// - Instruction d'affichage
// - Variables : Types / déclaration / Affectation
// - Concaténation
// - Guillemets & apostrophes
// - Constantes
// - Conditions et opérateurs de comparaison
// - Fonctions prédéfinies
// - Fonctions utilisateur
// - Boucles
// - Inclusion 
// - Array
// - Classes & objets 

// - Instruction d'affichage
echo "Bonjour"; // echo est une instruction nous permettant de générer un affichage dans le code source.
echo '<br>'; // il est possible de générer de l'html
echo 'bienvenue';

print '<hr>print permet également de générer un affichage'; // print est une autre instruction du langage nous permettant de générer des affichages. Pour le cours nous utiliserons echo

echo '<h2>Commentaires</h2>';

// ceci est un commentaire sur une seule ligne
# autre façon d'écrire un commentaire sur une seule ligne.
/*
Ceci
est un commentaire
sur plusieurs lignes.
*/
?>
<?= 'Balise permettant de générer un affichage'; ?>

<?php
echo '<h2>Variables : types / déclaration / affectation</h2>';
// définition : une variable est un espace nommé permettant de conserver une valeur.
// déclaration d'une variable en php avec le signe $
// caractères autorisés : a-z A-Z 0-9 _ en revanche, une variable ne peut pas commencer par un chiffre. 
// $a1 => ok
// $1a => nok
// $_a => ok
// $a_b_c => ok

$a = 127; // déclaration de la variable a et affectation de la valeur 127
echo gettype($a); // integer (un entier) // gettype() est une fonction prédéfinie nous permetant de connaitre le type d'une information.
echo '<br>';

$a = 1.5; // on change la valeur contenue dans la variable a
echo gettype($a); // double (chiffre à virgule)

echo '<br>';
$b = 'une chaine';
echo gettype($b); // string (une chaine de caractère)

echo '<br>';
$b = '127';
echo gettype($b); // string 

echo '<br>';
$c = true; // ou false ou TRUE ou FALSE
echo gettype($c); // boolean (vrai / faux - 1 / 0)

echo '<h2>Concaténation</h2>';
// la concaténation nous permet d'assembler des chaines de caractères les unes avec les autres.
// en PHP, la concaténation se fait avec le point . que l'on peut toujours traduire par "suivi de"

$x = 'Bonjour';
$y = 'tout le monde';
echo $x . ' ' . $y . '<br>';

// différence entre guillemets & apostrophes
echo "$x $y <br>"; // dans des guillemets, les variables sont reconnues et interprétées !
echo '$x $y <br>'; // dans des apostrophes, les variables ne sont pas reconnues.

echo $x, ' ', $y, '<br>'; // il est possible d'utiliser la virgule pour la concaténation. /!\ ne fonctionne pas avec l'instruction print !!!

// concaténation lors de l'affectation
$prenom = 'Bruno';
$prenom = 'Marie';
echo $prenom . '<br>'; // affiche Marie

$prenom2 = 'Bruno';
$prenom2 .= ' Marie'; 
// équivaut à écrire : $prenom2 = $prenom2 . ' Marie';
echo $prenom2 . '<br>'; // affiche Bruno Marie

echo '<h2>Les constantes & constantes magiques</h2>';
// Une constante comme un variable permet de conserver une valeur sauf que comme son nom l'indique, cette valeur ne pourra pas être modifiée durant l'exécution du script.

// par convention, une constante s'écrit en majuscule

// pour déclarer une constante
define("CAPITALE", 'Paris'); 
 
// define(nom_de_la_constante, sa_valeur);

// appel de la constante :
echo CAPITALE . '<br>';

// Constantes magiques
echo __FILE__ . '<br>'; // le chemin complet du fichier actuel.
echo __LINE__ . '<br>'; // le numéro de la ligne

// echo __FUNCTION__ . '<br>'; // le nom de la fonction concernée
// echo __CLASS__ . '<br>'; // le nom de la classe concernée
// echo __METHOD__ . '<br>'; // le nom de la methode concernée

echo '<h2>Exercice variable</h2>';
// Exercice : Afficher Bleu-Blanc-Rouge en mettant les couleurs dans des variables !
$a = '<span style="color: blue">Bleu</span>';
$b = 'Blanc';
$c = 'Rouge';
$t = '-';
echo $a . '-' . $b . '-' . $c . '<br>';
echo $a . $t . $b . $t . $c . '<br>';
echo "$a-$b-$c<br>";
echo "$a$t$b$t$c<br>";

echo '<h2>Opérateurs arithmétique</h2>';
$a = 10;
$b = 2;
echo $a + $b . '<br>'; // affiche 12
echo $a - $b . '<br>'; // affiche 8
echo $a * $b . '<br>'; // affiche 20
echo $a / $b . '<br>'; // affiche 5

// modulo (le restant de la division en entier)
echo $a % $b . '<br>'; // Affiche 0

// raccourci => opération/affectation
$a = 10; $b = 2;
$a += $b; // équivaut à $a = $a + $b; // 12
$a -= $b; // équivaut à $a = $a - $b; // 10
$a /= $b; // équivaut à $a = $a / $b; // 5
$a *= $b; // équivaut à $a = $a * $b; // 10
$a %= $b; // équivaut à $a = $a % $b; // 0

echo '<h2>Structure conditionnelle : (if / elseif / else)  & les opérateurs de comparaison</h2>';
// isset & empty
// isset() test si une variable est définie (si elle existe) sans regarder la valeur à l'intérieur
// empty() test si une variable existe mais en plus vérifie si elle est vide.

$var1 = 0; // ou '' ou false
// on teste l'existence de la variable $var1
if(isset($var1)) {
	echo 'La variable var1 existe <br>';
} else {
	echo 'La variable var1 n\'existe pas <br>';
}

// on teste l'existence de la variable var1 mais aussi si elle vide
if(empty($var1)) {
	echo 'La variable var1 n\'existe pas ou elle est vide<br>';
} else {
	echo 'La variable var1 existe et n\'est pas vide<br>';
}


// if / elseif / else
$a = 10; $b = 5; $c = 2;
if($a > $b) { 
	// si la valeur de a est strictement supérieure à b
	echo $a . ' est bien supérieur à ' . $b . '<br>';
} else { 
	// sinon
	echo $a . ' n\est pas supérieur à ' . $b . '<br>';
}


// même condition => autre écriture
if($a > $b) : 
	echo $a . ' est bien supérieur à ' . $b . '<br>';
else : 
	echo $a . ' n\est pas supérieur à ' . $b . '<br>';
endif;

// même condition => autre écriture (possible uniquement s'il y a une seule instruction liée au if et au else)
if($a > $b)  
	echo $a . ' est bien supérieur à ' . $b . '<br>';
else  
	echo $a . ' n\est pas supérieur à ' . $b . '<br>';


// Plusieurs conditions obligatoires => &&
$a = 10; $b = 5; $c = 2;
if($a > $b && $b > $c) {
	echo 'Ok pour les deux conditions<br>';
}

// l'une ou l'autre des conditions => ||
if($a > 20 || $b > $c) {
	echo 'Ok pour au moins une des deux conditions<br>';
} else {
	echo 'Aucune des deux conditions n\'est vraie';
}
$a = 10; $b = 5; $c = 2;
// elseif (sinon si)
if($a == 8) {
	echo 'Réponse 1<br>';
} elseif($a != 10) {
	echo 'Réponse 2<br>';
} else {
	echo 'Réponse 3<br>';
}

// autre façon d'écrire une condition : Forme contrcatée => ternaire
echo ($a == 10) ? 'la valeur de a est 10<br>' : 'La valeur de a est différente de 10<br>';
// le ? représente le if
// les : représentent le else
// même condition en écriture classique : 
if($a == 10) {
	echo 'la valeur de a est 10<br>';
} else {
	echo 'La valeur de a est différente de 10<br>';
}

// Opérateur de comparaison
$a = 1; // int
$b = '1'; // string

if($a == $b) {
	echo 'la variable a et la variable b ont la même valeur<br>';
}

if($a === $b) {
	echo 'la variable a et la variable b ont la même valeur et le même type<br>';
} else {
	echo 'a et b ont soit une valeur différente soit un type différent<br>';
}
/*
	= 	Affectation d'une valeur
	==	Comparaison des valeurs uniquement
	!=  Différent en terme de valeur
	=== Comparaison des valeurs et des types (comparaison stricte)
	!== Différent en terme de valeur et/ou de type (comparaison stricte)
	>	Strictement supérieur
	>=	Supérieur ou égal
	< 	Strictement inférieur
	<=	Inférieur ou égal
*/

echo '<h2>Condition switch()</h2>';
// les 'case' représentent des cas différents dans lesquel nous pouvons potentiellement tomber.
$couleur = 'jaune';

switch($couleur) {
	case 'bleu' : 
		echo 'Vous aimez le bleu<br>';
	break;
	case 'vert' : 
		echo 'Vous aimez le vert<br>';
	break;
	case 'rouge' : 
		echo 'Vous aimez le rouge<br>';
	break;
	default : // cas par defaut
		echo 'Vous n\'aimez ni le bleu, ni le vert ni le rouge<br>';
	break;
}
$couleur = 'jaune';
// Exercice : refaire la même condition avec if / elseif /else
if($couleur == 'bleu') {
	echo 'Vous aimez le bleu<br>';
} elseif($couleur == 'rouge') {
	echo 'Vous aimez le rouge<br>';
} elseif($couleur == 'vert') {
	echo 'Vous aimez le vert<br>';
} else {
	echo 'Vous n\'aimez ni le bleu, ni le vert ni le rouge<br>';
}

echo '<h2>Fonctions prédéfinies</h2>';
// une fonction prédéfinie est inscrite au langage, le développeur ne fait que l'exécuter.

echo '<b>Date : </b><br>';
echo date('d/m/Y à H:i:s') . '<br>';
// d pour le numéro du jour
// m pour le numéro du mois
// Y pour l'année en 4 chiffres

// Fonctions de traitement de chaine (string) : strpos() / strlen() / substr()

// strpos()
$email = 'mail@mail.fr';

echo strpos($email, '@') . '<br>'; // on obtient un entier représentant la position du premier caractère du deuxième argument dans la chaine fournie en premier argument.
// /!\ le premier caractère à la position 0

$email2 = 'Bonjour';
echo strpos($email2, '@') . '<br>'; // cette ligne n'affiche rien pourtant on récupère bien qq chose.
// on récupère false
// pour voir le false on utilise var_dump() qui est une instruction d'affichage améliorée
echo '<pre>'; var_dump(strpos($email2, '@')); echo '</pre>';

/*
	strpos(chaine_ou_on_cherche, valeur_qu'on_cherche);
	Succes : on obtient un entier (int) représentant la position
	Echec  : on obtient le booleen false
*/

// strlen()
$phrase = 'Lorem ipsum';
echo strlen($phrase) . '<br>'; // affiche 11

// strlen() compte la taille d'une chaine en terme d'octet
// 1 caractère = 1 octet sauf pour les caractères spéciaux
// Pour la prise en compte des caractères spéciaux : iconv_strlen() 
// iconv_strlen() compte la taille d'une chaine en terme de caractère et non pas d'octet. Si un caractère vaut plus d'un octet cette fonction le comptera comme étant 1

// exemple :
echo strlen('€') . '<br>';
echo iconv_strlen('€') . '<br>';
/*
	Succes : un entier (int)
	Echec  : 0 
*/

// substr()
$texte = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed magna sapien, dictum sed lacus rhoncus, lacinia laoreet mauris. Nullam in augue at ante sagittis fringilla sodales id purus. Sed pretium augue eu tellus faucibus convallis at id lorem. Donec ut felis vel ante suscipit finibus nec nec odio.";
echo substr($texte, 0, 20) . '... <a href="">Lire la suite</a>';
// substr(la_chaine_à_couper, position_de_depart, nombre_de_caractère_à_renvoyer)

// iconv_substr() // pour la prise en charge des caractères spéciaux

echo '<h2>Fonctions utilisateur</h2>';
// fonction déclarée et exécutée par le developpeur

// déclaration d'une fonction permettant d'afficher 3 hr dans la page // cette fonction en reçoit pas d'argument
function separateur() {
	echo '<hr><hr><hr>';
}
// exécution : 
separateur();

// fonction avec argument : les argumets sont  des paramètres fournis à la fonction permettant de compléter ou modifier un traitement.
function bonjour($qui) {
	return 'Bonjour <b>' . $qui . '</b><br>';
	// la ligne suivante ne sera jamais exécutée car elle se trouve après un return.
	// Lorsque l'on tombe sur un return dans une fonction, on sort immédiatement de la fonction !
	echo 'TEST';
}
// avec un return, l'information est renvoyée, si l'on veut un affichage, à nous de mettre echo
echo bonjour('Marie'); // si un argument est attendu, nous sommes obligé de le fournir
$pseudo = 'Mathieu';
echo bonjour($pseudo); // il est possible de fournir un argument sous forme de variable.

// fonction permettant de calculer un tarif ttc
function applique_tva($valeur) {
	// pour une tva à 20%
	return $valeur * 1.2;
}

echo '1000€ avec 20% de tva font : ' . applique_tva(1000) . '€ TTC<br>';
echo '365454€ avec 20% de tva font : ' . applique_tva(365454) . '€ TTC<br>';
separateur();
// faire une fonction similaire mais permettant à l'utilisateur de choisir également le taux de tva à appliquer.
function applique_tva_taux($valeur, $taux) {
	return $valeur * $taux;
	// return $valeur * (1+($taux/100));
}


echo '1000€ avec 20% de tva font : ' . applique_tva_taux(1000, 1.2) . '€ TTC<br>';
echo '1000€ avec 5.5% de tva font : ' . applique_tva_taux(1000, 1.055) . '€ TTC<br>';

separateur();

// la même fonction que précedemment en rendant l'argument $taux facultatif
// pour rendre un argument facultatif, on lui donne une valeur par défaut lors de la déclaration de la fonction.
function applique_tva_taux_facultatif($valeur, $taux = 1.2) {
	return $valeur * $taux;
}
echo '1000€ avec 20% de tva font : ' . applique_tva_taux_facultatif(1000) . '€ TTC<br>'; // avec un seul argument, $taux a sa valeur par defaut (1.2)
echo '1000€ avec 5.5% de tva font : ' . applique_tva_taux_facultatif(1000, 1.055) . '€ TTC<br>'; // avec deux arguments, le deuxième remplace la valeur par defaut de $taux (ici 1.055)

separateur();	

meteo('hiver', 0); // il est possible d'exécuter une fonction avant de l'avoir déclarée. (ce n'est pas possible avec une variable)

function meteo($saison, $temperature) {
	echo 'Nous sommes en ' . $saison . ' et il fait ' . $temperature . ' degré(s)<br>';	 
}
meteo('été', 30);
meteo('printemps', 18);
meteo('automne', 1);

// Exercice : il faut gérer le "en" ou le "au" des saisons (au printemps !) et le s de degré
function exo_meteo2($saison, $temperature) {
	
	if($saison == 'printemps') { 
		echo 'Nous sommes au ' . $saison;
	} else {
		echo 'Nous sommes en ' . $saison;
	}
	if($temperature > -2 && $temperature < 2) {
		echo ' et il fait ' . $temperature . ' degré<br>';
	} else {
		echo ' et il fait ' . $temperature . ' degrés<br>';
	}
}
separateur();

exo_meteo2('hiver', 0);
exo_meteo2('été', 30);
exo_meteo2('printemps', 18);
exo_meteo2('automne', 1);

//----------
function exo_meteo($saison, $temperature) {
	$article = 'en';
	$s = 's';	
	
	if($saison == 'printemps') { $article = 'au'; }
	if($temperature > -2 && $temperature < 2) { $s = ''; }
	
	echo 'Nous sommes ' . $article . ' ' . $saison . ' et il fait ' . $temperature . ' degré' . $s . '<br>';	
}
separateur();

exo_meteo('hiver', 0);
exo_meteo('été', 30);
exo_meteo('printemps', 18);
exo_meteo('automne', 1);


// La portée des variables (scope)
// espace global & espace local
// Le script complet représente l'espace global
// dans une fonction nous sommes dans un espace dit local !
// ESPACE LOCAL
function jour_semaine() {
	$jour = 'jeudi'; // variable locale
	return $jour;
}
jour_semaine();
echo $jour . '<br>'; // erreur car la variable $jour n'existe que dans la fonction // Notice: Undefined variable: jour

$recup = jour_semaine();
echo $recup . '<br>';
echo jour_semaine() . '<br>';

separateur();

// ESPACE GLOBAL
$pays = 'France';

function affichage_pays() {
	global $pays; // avec le mot clé global, il est possible de récupérer une variable déclarée dans l'espace global sinon la ligne en dessous afficherait une erreur.
	echo $pays . '<br>';
}
affichage_pays();

echo '<h2>Structure itérative : les boucles</h2>';

// while() {}


$i = 0; // valeur de depart

while($i < 10) { // condition d'entrée
	echo $i . ' - ';
	$i++; // $i = $i + 1; // incrémentation
	// $i--; // $i = $i - 1; // décrémentation
}
separateur();
// améliorer cette boucle afin de ne pas avoir le dernier tiret à la fin
// 0 - 1 - 2 - 3 - 4 - 5 - 6 - 7 - 8 - 9
$i = 0;
while($i < 10) { 
	
	if($i == 9) {
		echo $i;
	} else {
		echo $i . ' - ';
	}	
	$i++; 
}
separateur();
// Boucle for() {}
// for(valeur_de_depart; condition_d'entree; incrementation)

for($i = 0; $i < 10; $i++) {
	echo $i;
}
separateur();

// champs année pour un formulaire
echo '<select style="width: 210px; height: 30px; border: 1px solid #333;">';

for($i = date('Y'); $i > 1930; $i--) {
	echo '<option>' . $i . '</option>';
}

echo '</select>';

echo '<h2>Mélange PHP - HTML</h2>';


echo '<table style="border-collapse: collapse; width: 50%; margin: 0 auto;" border="1"><tr>';

for($i = 0; $i < 10; $i++) {
	echo '<td style="padding: 10px;">' . $i . '</td>';
}

echo '</tr></table>';

// réfaire cet exercice en allant plus loin, il faut afficher un tableau allant de 0 à 99 sur 10 lignes tr


echo '<h2>Inclusion de fichier</h2>';
// Création d'un fichier exemple.inc.php et copier coller du texte dans ce fichier. 
echo '<b>Appel du fichier avec include</b> : <br>';
include 'exemple.inc.php';

separateur();

echo '<b>Appel du fichier avec include_once</b> : <br>';
include_once 'exemple.inc.php';
// include_once vérifie si le fichier à déjà été appelé, si c'est le cas le fichier n'est pas rappelé sinon on l'appelle.
separateur();

echo '<b>Appel du fichier avec require</b> : <br>';
require 'exemple.inc.php';

separateur();

echo '<b>Appel du fichier avec require_once</b> : <br>';
require_once 'exemple.inc.php';
// require_once vérifie si le fichier à déjà été appelé, si c'est le cas le fichier n'est pas rappelé sinon on l'appelle.
separateur();


echo '<h2>Tableaux de données array</h2>';
// un tableau est un peu comme une variable simple mais au lieu de contenir une seule valeur, un tableau contient un ensemble de valeur.

// déclaration d'un tableau array
$liste = array('jaune', 'rouge', 'bleu', 'vert', 'blanc', 'noir', 'gris');

// 2 outils d'affichage amélioré : print_r() & var_dump()
echo '<b>Affichage du tableau avec print_r</b> : <br>';
echo '<pre>'; print_r($liste); echo '</pre>';

echo '<b>Affichage du tableau avec var_dump</b> : <br>';
echo '<pre>'; var_dump($liste); echo '</pre>';

// afficher la valeur "bleu" en passant par le tableau array $liste
echo $liste[2] . '<br>';
echo $liste[0] . '<br>';
separateur();
// La boucle foreach() {} pour les tableaux array ou les objets
foreach($liste AS $valeur) {
	echo '- ' . $valeur . '<br>';
}
// foreach(le_tableau AS variable_contenant_la_valeur_en_cours) {}
// dans une boucle foreach() le mot clé AS est obligatoire.
// S'il y a une seule variable après le AS cette variable contient la valeur en cours du tableau
// S'il y a deux variable après le AS, la première contient l'indice en cours et la deuxième la valeur en cours
separateur();
foreach($liste AS $ind => $val) {
	echo '- ' . $ind . ' : ' . $val . '<br>';
} 

// autre façon de déclarer un tableau array
$liste_pays[] = 'France';
$liste_pays[] = 'Espagne';
$liste_pays[] = 'Italie';
$liste_pays[] = 'Portugal';
$liste_pays[] = 'Belgique';
echo '<pre>'; var_dump($liste_pays); echo '</pre>';

// pour afficher une valeur
echo $liste_pays[2] . '<br>';
// pour changer une valeur
$liste_pays[2] = 'Suisse';
echo '<pre>'; var_dump($liste_pays); echo '</pre>';

// avec une boucle for() {}
$taille_tableau = count($liste_pays); // count() nous renvoie le nombre d'élément dans le tableau
$taille_tableau = sizeof($liste_pays); // similaire à count
echo 'Il y a ' . $taille_tableau . ' éléments dans notre tableau<br>';

for($i = 0; $i < $taille_tableau; $i++) {
	echo '- ' . $liste_pays[$i] . '<br>';
}

// il est possible de choisir nous même les indices
$utilisateur = array('pseudo' => 'test', 'nom' => 'Durand', 'prenom' => 'David', 'age' => 35);
echo '<pre>'; var_dump($utilisateur); echo '</pre>';
echo $utilisateur['nom'] . '<br>';

// on peut rajouter des éléments dans le tableau à tout moment.
$utilisateur['email'] = 'mail@mail.fr';
echo '<pre>'; var_dump($utilisateur); echo '</pre>';
// ksort($utilisateur); // pour réordonner le tableau dans l'ordre alphabétique ou numérique
// echo '<pre>'; var_dump($utilisateur); echo '</pre>';

echo '<h2>Tableaux multidimensionnel </h2>';
// un tableau array contenant un ou plusieurs tableaux array

$tab_multi = array(0 => array('prenom' => 'Marie', 'mail' => 'marie@mail.fr', 'age' => 32), 1 => array('prenom' => 'Pierre', 'mail' => 'pierre@mail.fr', 'age' => 21), 2 => array('prenom' => 'Franck', 'mail' => 'franck@mail.fr', 'age' => 40));

$tab_multi = array(
					0 => array(
						'prenom' => 'Marie', 
						'mail' => 'marie@mail.fr',
						'age' => 32),
					1 => array(
						'prenom' => 'Pierre', 
						'mail' => 'pierre@mail.fr', 
						'age' => 21), 
					2 => array(
						'prenom' => 'Franck', 
						'mail' => 'franck@mail.fr', 
						'age' => 40)
					);



echo '<pre>'; print_r($tab_multi); echo '</pre>';
echo '<pre>'; var_dump($tab_multi); echo '</pre>';

// on affiche toutes les informations avec 2 foreach()
echo '<ul>';
foreach($tab_multi AS $indice => $valeur) {
	echo '<li>' . $indice . '<ul>';	
	foreach($valeur AS $indice2 => $valeur2) {
		echo '<li>' . $indice2 . ' : ' . $valeur2 . '</li>';
	}	
	echo '</ul></li>';
}
echo '</ul>';
// sans les balises ul li
foreach($tab_multi AS $indice => $valeur) {
	foreach($valeur AS $indice2 => $valeur2) {
		echo '- ' . $indice2 . ' : ' . $valeur2 . '<br>';
	}	
}

separateur();
// pour affiche rune information d'un sous tableau :
echo $tab_multi[1]['mail'] . '<br>';
separateur();
// pour afficher uniquement les prénoms des sous tableaux avec une boucle for()
$taille_tab_multi = count($tab_multi);
for($i = 0; $i < $taille_tab_multi; $i++) {
	echo $tab_multi[$i]['prenom'] . '<br>';
}
	
echo '<h2>Les classes et objets</h2>';
// Une classe est un modèle de construction
// Un objet est issu d'une classe (c'est une instance de la classe)
// Un objet est un conteneur virtuel permettant de conserver un ensemble d'informations (appelées propriété ou attribut de l'objet) mais aussi des fonctions (appelées methode de l'objet)

// pour déclarer une classe
class Etudiant
{
	// propriétés
	public $prenom = 'Marie';
	public $mail = 'marie@mail.fr';
	public $age = 32;
	
	// le mot clé public permet de préciser que l'on peut appeler l'information directement sur l'objet généré sinon il faudrait passer par des methodes (fonctions) prévues pour modifier ou récupérer l'information 
	// il existe d'autres possibilités notamment protected / private
	
	// methode
	public function pays() {
		return 'France';
	}
}

// pour instancier un objet depuis la classe :
$objet1 = new Etudiant();
$objet2 = new Etudiant();
echo '<pre>'; var_dump($objet1); echo '</pre>';
echo '<pre>'; var_dump($objet2); echo '</pre>';

// pour voir les methodes d'un objet
echo '<pre>'; var_dump(get_class_methods($objet1)); echo '</pre>';
// get_class_methods() permet de voir les methodes d'un objet

// pour récupérer une information ou une methode d'un objet
echo $objet1->prenom . '<br>';
echo $objet1->mail . '<br>';
echo $objet1->age . '<hr>';
// la methode
echo $objet1->pays() . '<hr>';

// il est possible de modifier les propriétés : 
$objet1->age = 33;
echo $objet1->age . '<hr>';
echo $objet2->age . '<hr>';

// dans un tableau array on appelle une information avec les crochets []
// dans un objet avec la fleche ->









?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>