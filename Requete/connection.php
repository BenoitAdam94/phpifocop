<?php

$debug = 1;
include '../tools.php';

$host_db = 'mysql:host=localhost;dbname=connection';
$login = 'root';
$password = '';
$options = array(
				PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, 
				PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
				
$pdo = new PDO($host_db, $login, $password, $options);

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<style>
			.conteneur { width: 1000px; margin: 0 auto; }
			form { width: 50%; padding: 20px; border: 1px solid #333; margin: 0 auto; }
			input, select, textarea { width: 100%; border: 1px solid #333; min-height: 30px; resize: vertical; }
			#confirm { background-color: #333; color: white; }
		</style>
	</head>
	
	<body>
		<div class="conteneur">		
			<form method="post" action="">			
				<h1>Connexion</h1>
				<?php
				$pseudo = '';
				$mdp = '';
				if(isset($_POST['pseudo']) && isset($_POST['mdp'])) {
					$pseudo = trim($_POST['pseudo']);
					$mdp = trim($_POST['mdp']);
				
				echo "Votre pseudo est : $pseudo";
				echo "<br>";
				echo "Votre mot de passe est : $mdp";
				echo "<br><br>";

				$req = "SELECT * FROM utilisateur WHERE pseudo = '$pseudo' AND mdp = '$mdp'";
				echo "<b>Requete :</b> $req <hr>";

				//on execute la requete avec la méthode query
				//$resultat = $pdo -> query($req);

				//on execute la requete avec la méthode prepare
				$resultat = $pdo -> prepare("SELECT * FROM utilisateur WHERE pseudo = :pseudo AND mdp = :mdp");

				$resultat->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
				$resultat->bindParam(':mdp', $mdp, PDO::PARAM_STR);
				$resultat->execute();

				// on verifie le nombre de ligne dans la réponse
				if($resultat->rowCount() > 0) {
					echo "ok !<br>";
					$infos = $resultat->fetch(PDO::FETCH_ASSOC);
					foreach($infos AS $indice => $valeur) {
						echo "$indice : $valeur<br>";
					}
				} else {
					// 0 ligne pseudo et / ou mdp sont incorrect
					echo "Erreur";
				}

				}
				?>
				<hr>
				<label for="pseudo">Pseudo</label>
				<input type="text" name="pseudo" id="pseudo" value="<?php echo $pseudo; ?>">
				<br>
				<label for="mdp">Mot de passe</label>
				<input type="text" name="mdp" id="mdp">
				<hr>
				<input type="submit" id="confirm" value="Connexion">
			</form>
		</div>
	</body>
</html>