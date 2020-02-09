<?php

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