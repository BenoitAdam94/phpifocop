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
$resultat = $pdo -> exec("INSERT INTO employes (id_employes, nom, prenom, sexe, service, salaire, date_embauche) VALUES (NULL, 'Test_insert_nom', 'Test_insert_prenom', 'm', 'informatique', 2000, CURDATE())");

echo 'Nbr de ligne impacte par cette requete ' . $resultat . '<br>';
echo 'Dernier id inséré dans la BDD' . $pdo -> lastInsertID() . '<br>';


echo '<h2>03 - PDO : query() pour une seul ligne de résultat</h2>';

$resultat = $pdo -> query("SELECT * FROM employes WHERE id_employes = 350");


dump($resultat);
dump(get_class_methods($resultat));

?>