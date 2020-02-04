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
	- prepare() permet de préparer la requete mais ne l'execute pas.
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
$host_db = 'mysql:host=localhost;dbname=entreprise'; // adresse serveur / nom de la bdd
$login = 'root'; // identifiant de connexion à la BDD
$password = ''; // le mdp de connexion à la BDD
$options = array(
				PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // gestion des erreurs
				PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' // pour l'utf-8
				);
				
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

// $resultat représente la réponse de la BDD mais est en l'état inexploitable par php
// Pour rendre les informations contenues dans la reponse, nous devons utiliser les methodes fetch() ou fetchAll() afin de transformer les informations en un format exploitable (notamment en tableau array)

$employe = $resultat->fetch(PDO::FETCH_ASSOC); // pour un tableau array associatif (le nom des colonnes comme indice du tableau)
	
// $employe = $resultat->fetch(PDO::FETCH_NUM); // pour un tableau array avec des indices numériques	

// $employe = $resultat->fetch(PDO::FETCH_BOTH); // Melange de FETCH_ASSOC & FETCH_NUM // PDO::FETCH_BOTH est le cas par défaut si on ne précise aucun mode

// $employe = $resultat->fetch(PDO::FETCH_OBJ); // pour un objet avec les informations sous forme de propriétés publiques

echo '<pre>'; var_dump($employe); echo '</pre>';

echo $employe['prenom'] . '<br>'; // avec FETCH_ASSOC
// echo $employe[1] . '<br>'; // avec FETCH_NUM
// echo $employe->prenom . '<br>'; // avec FETCH_OBJ

// en utilisant fetch, on traite la ligne en cours.
// Si la requete renvoie une seule ligne => un seul fetch
// Si la requete renvoie plusieurs lignes => une boucle avec un fetch à chaque tour.

echo '<h2>04 - PDO : query() pour plusieurs lignes de résultat</h2>';

// on récupère toutes les lignes de la table employes
$resultat = $pdo->query("SELECT * FROM employes");

echo 'Il y a ' . $resultat->rowCount() . ' employés dans la table<br>';
// $resultat->rowCount() permet d'obtenir le nombre de ligne dans la réponse de la BDD

// plusieurs lignes donc une boucle
while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
	// à chaque tour de boucle, la variable $ligne reçoit le traitement fetch() de la ligne en cours. Avec PDO::FETCH_ASSOC, $ligne est un tableau array associatif.	
	// echo '<pre>'; var_dump($ligne); echo '</pre><hr>';
	// echo $ligne['prenom'] . '<br>';	
	echo '<div style="display: inline-block; margin: 1%; width: 22%; box-sizing: border-box; padding: 10px; color: white; background-color: steelblue; overflow: hidden;">';
	/*
	echo '<b>Id employé : </b>' . $ligne['id_employes'] . '<br>';
	echo '<b>Prénom : </b>' . $ligne['prenom'] . '<br>';
	echo '<b>Nom : </b>' . $ligne['nom'] . '<br>';
	echo '<b>Sexe : </b>' . $ligne['sexe'] . '<br>';
	echo '<b>Service : </b>' . $ligne['service'] . '<br>';
	echo '<b>Salaire : </b>' . $ligne['salaire'] . '€<br>';
	echo '<b>Date embauche : </b>' . $ligne['date_embauche'];
	*/	
	foreach($ligne AS $indice => $valeur) {
		echo '<b>' . ucfirst($indice) . '</b> : ' . $valeur . '<br>';
	}	
	echo '</div>';
}


echo '<h2>05 - PDO : query() pour plusieurs lignes de résultat avec fetchAll()</h2>';
// fetchAll() permet de ne pas faire une boucle pour appliquer le fetch à la ligne en cours à chaque tour.
// fetchAll() nous renvoie un tableau array multidimensionnel avec toutes les lignes traitées à des indices différents du tableau.
$resultat = $pdo->query("SELECT * FROM employes WHERE sexe = 'f'");

$les_lignes = $resultat->fetchAll(PDO::FETCH_ASSOC);

echo '<pre>'; var_dump($les_lignes); echo '</pre>';

foreach($les_lignes AS $valeur) {
	echo $valeur['prenom'] . '<br>';
}
echo '<hr>';
for($i = 0; $i < count($les_lignes); $i++) {
	echo $les_lignes[$i]['prenom'] . '<br>';
}

echo '<h2>05 - PDO : Exercice : Récupérer la liste des BDD du serveur et les afficher dans une liste ul li</h2>';
// SHOW DATABASES

$resultat = $pdo->query("SHOW DATABASES");
echo '<ul>';
while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
	// var_dump($ligne);
	echo '<li>' . $ligne['Database'] . '</li>';
}
echo '</ul>';

// avec un fetchAll()
$resultat = $pdo->query("SHOW DATABASES");
$liste_bdd = $resultat->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>'; var_dump($liste_bdd); echo '</pre>';

echo '<ul>';

foreach($liste_bdd AS $val) {
	echo '<li>' . $val['Database'] . '</li>';
}

echo '</ul>';

echo '<h2>06 - PDO : Affichage de n\'importe quelle réponse de la BDD sous forme de tableau html</h2>';
//$resultat = $pdo->query("SELECT * FROM employes");
$resultat = $pdo->query("SELECT * FROM employes");

echo '<table style="border-collapse: collapse; width: 80%; margin: 0 auto;" border="1">';

echo '<tr>';
// columnCount() => nous renvoie le nombre de colonne dans un résultat de requete
// getColumnMeta(n) => nous renvoie les informations de la colonne correspondant au chiffre fourni en argument

for($i = 0; $i < $resultat->columnCount(); $i++) {
	// var_dump($resultat->getColumnMeta($i));
	// on récupère les informations de la colonne en cours sous forme de tableau array
	$colonne = $resultat->getColumnMeta($i);
	echo '<th style="padding: 10px;">' . ucfirst($colonne['name']) . '</th>';
}
echo '</tr>';

// une boucle while avec un fetch à chaque tour pour afficher les données du tableau
while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
	echo '<tr>';	
	foreach($ligne AS $valeur) {
		echo '<td style="padding: 10px;">' . $valeur . '</td>';
	}	
	echo '</tr>';
}

echo '</table>';


echo '<h2>07 - PDO : prepare() + bindParam() ou bindValue() & execute()</h2>';
// les requetes avec la methode prepare() est à privilégier pour la sécurité.
$nom = 'laborde';
$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom");
// :nom est un marqueur nominatif qui attend un information fournie via bindParam() ou bindValue()
$resultat->bindParam(':nom', $nom, PDO::PARAM_STR);
// $resultat->bindValue(':nom', 'laborde', PDO::PARAM_STR);
// bindParam(le_marqueur, sa_valeur, son_type)
// avec bindParam() la valeur ne peut qu'être sous forme de variable
// avec bindValue() la valeur peut être fournie directement

$resultat->execute(); // on execute la requete
// echo '<pre>'; var_dump($resultat); echo '</pre>';
$result = $resultat->fetch(PDO::FETCH_ASSOC);
echo '<pre>'; var_dump($result); echo '</pre>';



















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
<br>
<br>