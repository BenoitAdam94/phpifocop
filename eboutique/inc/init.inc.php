<?php
// BDD

$host_db = 'mysql:host=localhost;dbname=eboutique'; 
$login = 'root'; 
$password = ''; 
$options = array(
				PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, 
				PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' 
				);				
$pdo = new PDO($host_db, $login, $password, $options);

$msg = "";

// URL racine du projet
define('URL', 'http://elephpant/eboutique/');

session_start();

//chemin racine serveur
define('SERVER_ROOT', $_SERVER['DOCUMENT_ROOT']);

define('SITE_ROOT', '/eboutique/');