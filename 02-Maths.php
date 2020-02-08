<?php

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
?>