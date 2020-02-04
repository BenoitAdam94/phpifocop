<?php

$debug = 1;
include '../tools.php';



// pdo.php

// php data objects

// exec = nombre de lignes


echo '<h1>01 - PDO - connexion</h1>';

$host_db = 'mysql:host=localhost;dbname=entreprise';
$login = 'root';
$password = '';
$options = array (
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
$pdo = new PDO($host_db, $login, $password, $options);

// en une ligne :
// $pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND) );

dump($pdo);
dump(get_class_methods($pdo));

echo '<h2>02 - PDO : exec()</h2>';
// Insertion
// $resultat = $pdo -> exec("INSERT INTO employes (id_employes, nom, prenom, sexe, service, salaire, date_embauche) VALUES (NULL, 'Test_insert_nom', 'Test_insert_prenom', 'm', 'informatique', 2000, CURDATE())");

echo 'Nbr de ligne impacte par cette requete ' . $resultat . '<br>';
echo 'Dernier id inséré dans la BDD' . $pdo -> lastInsertID() . '<br>';


echo '<h2>03 - PDO : query() pour une seul ligne de résultat</h2>';

$resultat = $pdo -> query("SELECT * FROM employes WHERE id_employes = 350");


dump($resultat);
dump(get_class_methods($resultat));

$employe = $resultat->fetch(PDO::FETCH_OBJ);
dump($employe);

// echo $employe2['prenom'] . '<br>'; // avec FETCH_ASSOC
// dump($employe2);

// echo $employe[1] . '<br>'; // avec FETCH_NUM

echo $employe->prenom . '<br>'; // avec FETCH_OBJ

echo '<h2>04 - PDO : query() pour plusieurs lignes de résultat</h2>';

//On récupérer les lignes de la table employé

$resultat = $pdo -> query("SELECT * FROM employes");

echo 'Il y a ' . $resultat -> rowCount() . ' employes dans la table<br>';
// $resultat

while($ligne = $resultat -> fetch(PDO::FETCH_ASSOC)) {
    
    echo'<div style="display: inline-block; margin: 1%; width:22%; box-sizing: border-box; padding: 10px; color:white; background-color: steelblue; overflow: hidden;">';
/*
    echo 'Id employé : ' . $ligne['id_employes'] . '<br>';
    echo 'Prenom : ' . $ligne['prenom'] . '<br>';
    echo 'Nom : ' . $ligne['nom'] . '<br>';
    echo 'Sexe : ' . $ligne['sexe'] . '<br>';
    echo 'Service : ' . $ligne['service'] . '<br>';
    echo 'Salaire : ' . $ligne['salaire'] . '<br>';
    echo 'Date Embauche: ' . $ligne['date_embauche'] . '<br>';
*/


    foreach($ligne AS $indice => $valeur) {
        echo'<b>' . ucfirst($indice) . '</b> : ' . $valeur . '<br>';
    }
    echo '</div>';
}


echo "<h2>05 - PDO : query () pour plusieurs lignes de résultat avec fetchAll () </h2>";

$resultat = $pdo -> query("SELECT * FROM employes WHERE sexe = 'f'");

$les_lignes = $resultat -> fetchAll(PDO::FETCH_ASSOC);

dump($les_lignes);

foreach($les_lignes AS $valeur) {
    echo $valeur['prenom'] . '<br>';
}

for($i = 0; $i < count($les_lignes); $i++) {
    echo $les_lignes[$i]['prenom'] . '<br>';
}

echo '<h2>05 - PDO : Exercice : Récupérer la liste des BDD du serveur et les afficher dans une liste ul li</h2>';

$resultat = $pdo -> query("SHOW DATABASES;");

$bdd = $resultat -> fetchAll(PDO::FETCH_ASSOC);

dump($bdd);

echo "<ul>";

foreach($bdd AS $valeur) {
    echo "<li>";
    echo $valeur['Database'] . '<br>';
    echo "</li>";
}
echo '</ul>';


$bdd = $resultat -> fetch(PDO::FETCH_ASSOC);
dump($bdd);



echo '<ul>';
while($ligne = $bdd) {
    echo '<li>' . $ligne['Database'] . '</li>';
}
echo '</ul>';



echo '<h2>06 - PDO tablo</h2>';


$resultat = $pdo -> query("SELECT * FROM employes");

echo '<table border="1">';
echo '<tr>';

for($i = 0; $i < $resultat -> columnCount(); $i++) {
    $colonne = $resultat -> getColumnMeta($i);
    echo '<th style="padding:10px">' . ucfirst($colonne['name']) . '</th>';
}

echo '</tr>';

while ($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
    echo '<tr>';
    foreach($ligne AS $valeur) {
        echo '<td style="padding:10px;">' . $valeur . '</td>';
    }
        
}

echo "</table>";


echo '<h2>07 - PDO : prepare() + bindParam() ou bindValue() & execute() </h2>';

$nom = 'laborde';
$resultat = $pdo -> prepare("SELECT * FROM employes WHERE nom = :nom");

// :nom attend bindparam ou bindValue

$resultat -> bindParam(':nom', $nom, PDO::PARAM_STR);
// bindParam(le marqueur, sa valeur, son type)
// bindParam = valeur = variable
// bindParam = valeur = fournie directement

dump($resultat);

$resultat -> execute();
$result = $resultat -> fetch(PDO::FETCH_ASSOC);
dump($result);

?>