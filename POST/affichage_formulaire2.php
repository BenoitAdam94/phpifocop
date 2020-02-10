<?php 

echo '<pre>'; var_dump($_POST); echo '</pre>';

// Afficher proprement les informations présentes dans $_POST via des echo
// /!\ si ça existe !

// Vérifier la taille du pseudo, le pseudo doit faire entre 4 et 14 caractères
// Si la taille du pseudo ne correspond pas, on affiche un message d'erreur

if(isset($_POST['pseudo']) && isset($_POST['email'])) {
	
	$erreur = 0; // variable de controle.
	
	$pseudo = trim($_POST['pseudo']);
	$email = trim($_POST['email']);
	// trim() permet de supprimer les espace en début et en fin de chaine.
	
	echo '<b>Pseudo : </b>' . $pseudo . '<hr>';
	echo '<b>Email : </b>' . $email . '<hr>';
	
	// Vérification de la taille du pseudo
	$taille_pseudo = iconv_strlen($pseudo);
	echo '<b>Taille pseudo : </b>' . $taille_pseudo . '<hr>';
	
	// if(iconv_strlen($pseudo) < 4 || iconv_strlen($pseudo) > 14)
	if($taille_pseudo < 4 || $taille_pseudo > 14) {
		echo '<div style="color: white; background-color: red; padding: 20px;">Attention, <br>Le pseudo doit avoir entre 4 et 14 caractères inclus.<br>Veuillez recommencer</div>';
		
		// cas d'erreur
		$erreur = 1; // on change la valeur de cette variable pour la tester ensuite.
		// 0 => pas d'erreur // 1 => erreur
		
	} else {
		echo '<div style="color: white; background-color: darkgreen; padding: 20px;">Pseudo ok</div>';
	}
	
	// vérification de la validité de l'email.
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		echo '<div style="color: white; background-color: red; padding: 20px; margin-top: 20px;">Attention, <br>Le format de l\'email n\'est pas valide.<br>Veuillez recommencer</div>';
		// cas d'erreur
		$erreur = 1; 
	} else {
		echo '<div style="color: white; background-color: darkgreen; padding: 20px; margin-top: 20px;">Email ok</div>';
	}

	// on vérifie s'il n'y a pas eu d'erreur
	//if(!$erreur) {
	if($erreur == 0) {
		
		// si $erreur a la valeur 0, alors il n'y a pas eu d'erreur dans nos traitement.
		
		// création ou ouverture d'un fichier sur le serveur
		$f = fopen('liste.txt', 'a'); 
		// fopen() en mode "a" (deuxième argument) permet de créer un fichier ou de l'ouvrir s'il existe déjà
		
		// on écrit dans ce fichier le pseudo et le mail que l'on a récupéré.
		fwrite($f, $pseudo . ' - ' . $email . "\n"); // "\n" entre guillemets (obligatoire) permet un retour à la ligne dans un fichier.
		
		// on ferme le fichier pour libérer de l'espace sur le serveur
		fclose($f);
		
	}
}


// maintenant que nous avons enregistré les informations dans un fichier texte, nous allons afficher son contenu dans la page.

// on vérifie si le fichier existe
if(file_exists('liste.txt')) {
	
	// on récupère le contenu :
	$contenu = file('liste.txt');
	// la fonction prédéfinie file() place chaque ligne d'un fichier dans des indices différents d'un tableau array
	
	echo '<pre>'; var_dump($contenu); echo '</pre>';
	
	
	echo '<ul>';
	
	foreach($contenu AS $ligne) {
		echo '<li>' . $ligne . '</li>';
	}
	
	echo '</ul>';

	
}










