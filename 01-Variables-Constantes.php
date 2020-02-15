<style>
h2 { padding:20px; background-color:#333; color: white; }
.rouge { color:red; }
.bleu { color:blue; }
.gray { color:gray; }
</style>
<h2>Ecriture & Affichage</h2>

<?php 
$debug = 0;
include 'tools.php';
// commentaire
/* commentaire
multi-lignes */
# commentaire également

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
     

?>