<?php
$host_db = 'mysql:host=localhost;dbname=commentaire'; 
$login = 'root'; 
$password = ''; 
$options = array(
				PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, 
				PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' 
				);				
$pdo = new PDO($host_db, $login, $password, $options);

// si pseudo et message existent déclencher un insert into dans la BDD pour enregistrer le message
// la valeur du champs date_enregistrment sera la fonction prédéfinie sql NOW()


if(isset($_POST['pseudo']) && isset($_POST['message'])) {
	
	$pseudo = trim($_POST['pseudo']);
	$message = trim($_POST['message']);
	
	// $pdo->query("INSERT INTO message (pseudo, message, date_enregistrement) VALUES ('$_POST[pseudo]', '$_POST[message]', NOW())");
	
	// $pdo->query("INSERT INTO message (pseudo, message, date_enregistrement) VALUES ('" . $_POST['pseudo'] . "', '" . $_POST['message'] . "', NOW())");
	
	// $pdo->query("INSERT INTO message (pseudo, message, date_enregistrement) VALUES ('$pseudo', '$message', NOW())");
		
	// avec prepare
	$enregistrement = $pdo->prepare("INSERT INTO message (pseudo, message, date_enregistrement) VALUES (:pseudo, :message, NOW())");
	$enregistrement->bindParam(":pseudo", $pseudo, PDO::PARAM_STR);
	$enregistrement->bindParam(":message", $message, PDO::PARAM_STR);
	$enregistrement->execute();
}



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
				<h1> Commentaire </h1>
				
				<hr>
				<label for="pseudo">Pseudo</label>
				<input type="text" name="pseudo" id="pseudo" value="">
				<br>
				<label for="message">Message</label>
				<textarea name="message" id="message"></textarea>
				<hr>
				<input type="submit" id="confirm" value="Valider">
			</form>
			<div id="affichage">
			while($ligne = $liste_message->fetch(PDO::FETCH_ASSOC)) {
				// var_dump($ligne);
				echo 'Par : <b>' . htmlentities($ligne['pseudo'], ENT_QUOTES) . '</b> à ' . $ligne['date_enregistrement'] . '<br><br>';
			}
			
			echo '<hr><hr><hr><hr><hr>';
			/*
			// Avec un fetchAll
			$liste_message = $pdo->query("SELECT * FROM message ORDER BY date_enregistrement DESC");
			
			$messages = $liste_message->fetchAll(PDO::FETCH_ASSOC);
			foreach($messages AS $valeur) {
				echo 'Par : <b>' . $valeur['pseudo'] . '</b> à ' . $valeur['date_enregistrement'] . '<br><br>';
				echo '<p><b>Message : </b>' . $valeur['message'] . '</p><hr>';
			}
			*/

			?>
			</div>
			<?= ?>
		</div>
	</body>
</html>