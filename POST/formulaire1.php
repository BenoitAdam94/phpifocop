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
		
			<?php 
				echo '<pre>'; var_dump($_POST); echo '</pre>';
				
				// afficher avec des echo les informations provenant du formulaire
				
				if(isset($_POST['pseudo']) && isset($_POST['description'])) {
					echo 'Le pseudo est : ' . $_POST['pseudo'] . '<br>';
					echo 'La description est : ' . $_POST['description'] . '<hr>';
				}
				
				
				
				
			?>
		
			<form method="post" action="" enctype="multipart/form-data">
			<!-- 
			method="post" => la méthode utilisée pour envoyer les données provenant du formulaire get/post (get par defaut)
			
			action="" => l'url cible lors de la validation du formulaire
			
			enctype="multipart/form-data" => obligatoire s'il y a des pièce jointe dans le formulaire (input type="file")
			
			-->
				<h1>Formulaire 1</h1>
				<label for="pseudo">Pseudo</label>
				<input type="text" name="pseudo" id="pseudo">
				<br>
				<label for="description">Description</label>
				<textarea name="description" id="description"></textarea>
				<hr>
				<input type="submit" id="confirm" value="Confirmer">
			</form>
		</div>
	</body>
</html>