<?php

// pdo.php

//************** Php Data Object

/*
La methode exec()
-----------------
	Pour des requetes de type Action : INSERT / UPDATE / DELETE
	- exec() est utilisé pour des requetes ne retournant pas de résultat.
	- A la place lorsque l'on utilise exec() on obtient un chiffre représentant le nombre de ligne impactées par la requete.
	
	Valeur de retour : 
	- Echec : false
	- Succès : un entier (int) représentant le nb de lignes impactées

La methode query()
------------------
	Pour tout type de requete INSERT / UPDATE / DELETE / SELECT / SHOW / CREATE ....
	
	Valeur de retour :
	- Echec : false
	- Succès : un nouvel objet issu de la classe PDOStatement

Les methodes prepare() & execute()
----------------------------------
	Pour tout type de requete INSERT / UPDATE / DELETE / SELECT / SHOW / CREATE ....
	A privilégier pour la sécurité
	- prepare() permet de préparer la reqeuet mais ne l'execute pas.
	- execute() permet d'exécuter la requete préparée.
	
	Valeur de retour :
	- prepare() renvoie toujours un objet PDOStatement
	- execute()
		- Echec : false
		- Succès : un objet PDOStatement
*/

echo '<h1>01 - PDO : connexion</h1>';
// $pdo = new PDO('nom_serveur;nom_bdd', 'login', 'mdp', 'array_avec_des_options');

// $pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// même chose, autre écriture.
$host_db = 'mysql:host=localhost;dbname=entreprise';
$login = 'root';
$password = '';
$options = array(
				PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, 
				PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
				
$pdo = new PDO($host_db, $login, $password, $options);

echo '<pre>'; var_dump($pdo); echo '</pre>';
// pour voir les methodes
echo '<pre>'; var_dump(get_class_methods($pdo)); echo '</pre>';

echo '<h2>02 - PDO : exec()</h2>';
// insertion dans la table employes de la BDD entreprise
// $resultat = $pdo->exec("INSERT INTO employes (id_employes, nom, prenom, sexe, service, salaire, date_embauche) VALUES (NULL, 'Test_insert_nom', 'Test_insert_prenom', 'm', 'informatique', 2000, CURDATE())");

// echo 'Nombre de ligne impactée par cette requete : ' . $resultat . '<br>';
// echo 'Dernier id inséré dans la BDD : ' . $pdo->lastInsertId() . '<br>';

echo '<h2>03 - PDO : query() pour une seule ligne de résultat</h2>';

$resultat = $pdo->query("SELECT * FROM employes WHERE id_employes = 350");

echo '<pre>'; var_dump($resultat); echo '</pre>';
echo '<pre>'; var_dump(get_class_methods($resultat)); echo '</pre>';




