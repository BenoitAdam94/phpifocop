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

// la valeur du champs date_enregistrement sera la fonction prédéfinie sql NOW()

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
				<h1>Commentaire</h1>
                
				<hr>
				<label for="pseudo">Pseudo</label>
				<input type="text" name="pseudo" id="pseudo" value="">
				<br>
				<label for="message">Message</label>
				<textarea name="message" id="message"></textarea>
				<hr>
				<input type="submit" id="confirm" value="Valider">
			</form>
			<hr>
			<div id="affichage">
            <?php
            $pseudo = '';
            $message = '';
            $date_enregistrement = '';

            if(isset($_POST['pseudo'])
                && isset($_POST['message'])
                //&& isset($_POST['date_enregistrement'])
                ) {
            
                $pseudo = trim($_POST['pseudo']);
                $message = trim($_POST['message']);
                
                $insertion = $pdo -> prepare("INSERT INTO message (pseudo, message, date_enregistrement) VALUES (:pseudo, :message, NOW())");
                $insertion->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
				$insertion->bindParam(':message', $message, PDO::PARAM_STR);
                $insertion->execute();
                
            
            echo "Auteur : $pseudo - $date_enregistrement <br>";
            echo "$message <br>";

            echo "<div>";
            $req1 = "SELECT * FROM message WHERE pseudo = '$pseudo' AND message = '$message'";
            $req2 = $date_enregistrement;
            echo "<b>Requete :</b> $req1 <br> $req2 <hr>";
            echo "</div><br>";
            }
            $liste_message = $pdo->query("SELECT * FROM message ORDER BY date_enregistrement DESC");

            // echo "$liste_message";

            while($ligne = $liste_message -> fetch(PDO::FETCH_ASSOC))
            {
                // var_dump($ligne);
                echo "Auteur : <b> htmlentities($ligne[pseudo], ENT_QUOTES) </b> - Date : htmlentities($ligne[date_enregistrement], ENT_QUOTES) <br>";
                echo "htmlentities($ligne[message], ENT_QUOTES) <br><hr><br>";
                
                //var_dump($ligne);
                //echo "$message";
            }
            
            //avec un Fetchall

            ?>
			
			</div>
		</div>
	</body>
</html>