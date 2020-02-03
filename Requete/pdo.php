<?php

$debug = 1;
include '../tools.php';



// pdo.php

// php data objects

// exec = nombre de lignes


echo '<h1>01 - PDO - connexion</h1>';

$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND) );



?>