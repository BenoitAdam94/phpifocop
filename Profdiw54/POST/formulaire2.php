<?php
// formulaire2.php
// affichage_formulaire2.php

// Sur la page formulaire2.php, faire un formulaire method="post" avec les champs suivants : 
// pseudo (input type="text")
// email (input type="text")
// + bouton de validation

// cette page doit envoyer les données sur la page affichage_formulaire2.php

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
			<form method="post" action="affichage_formulaire2.php">			
				<h1>Formulaire 2</h1>
				<label for="pseudo">Pseudo</label>
				<input type="text" name="pseudo" id="pseudo">
				<br>
				<label for="email">Email</label>
				<input type="text" name="email" id="email">
				<hr>
				<input type="submit" id="confirm" value="Confirmer">
			</form>
		</div>
	</body>
</html>



