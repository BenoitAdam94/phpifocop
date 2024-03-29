<?php 
include 'inc/init.inc.php';
include 'inc/fonction.inc.php';

// si l'utilisateur est connecté, on le renvoie sur la page profil
if(user_is_connect()) {
	header('location:profil.php');
}


$pseudo = '';
$mdp = '';
$prenom = '';
$nom = '';
$email = '';
$sexe = '';
$ville = '';
$cp = '';
$adresse = '';
// on controle l'existence des champs du formulaire	
if(
	isset($_POST['pseudo']) && 
	isset($_POST['mdp']) && 
	isset($_POST['prenom']) && 
	isset($_POST['nom']) && 
	isset($_POST['email']) && 
	isset($_POST['sexe']) && 
	isset($_POST['ville']) && 
	isset($_POST['cp']) && 
	isset($_POST['adresse'])) {
		
		// echo 'TEST';
		$pseudo = trim($_POST['pseudo']);
		$mdp = trim($_POST['mdp']);
		$prenom = trim($_POST['prenom']);
		$nom = trim($_POST['nom']);
		$email = trim($_POST['email']);
		$sexe = trim($_POST['sexe']);
		$ville = trim($_POST['ville']);
		$cp = trim($_POST['cp']);
		$adresse = trim($_POST['adresse']);
		
		
		// on bloque certains caractères pour le champ pseudo via une expression régulière (regex). On autorise uniquement a-z A-Z 0-9 -._ 
		$verif_caractere = preg_match('#^[a-zA-Z0-9._-]+$#', $pseudo);
		/*
		preg_match() est une fonction prédéfinie permettant de vérifier une chaine fournie en deuxième argument selon une expression régulière fournie en premier argument. Renvoie 1 si c'est ok sinon 0
		
		- les # indiquent le début et la fin de l'expression régluière
		- Entre les [] se trouvent tous les caractères autorisés.
		- ^ indique que le début de la chaine ne peut pas commencer par un autre caractère que ceux présent dans les []
		- $ indique que la fin de la chaine ne peut pas finir par un autre caractère que ceux présent dans les []
		- Le + permet d'indiquer que les caractères peuvent être présent plusieurs fois.		
		
		*/
		
		if(!$verif_caractere && !empty($pseudo)) {
			// cas d'erreur
			$msg .= '<div class="alert alert-danger mt-3">Pseudo invalide, caractères autorisés : a-z et de 0-9</div>';			
		}
		
		// vérifier la taille du pseudo => message d'erreur si le pseudo n'est pas entre 4 et 14 caractères inclus.
		if(iconv_strlen($pseudo) < 4 || iconv_strlen($pseudo) > 14) {
			// cas d'erreur
			$msg .= '<div class="alert alert-danger mt-3">Pseudo invalide, le pseudo doit avoir entre 4 et 14 caractères inclus</div>';	
		}
		
		// mettre en place un controle sur la validité du format de l'email
		
		
		// s'il n'y pas eu d'erreur au préalable, on doit vérifier si le pseudo existe déjà dans la BDD
		if(empty($msg)) {
			// si la variable $msg est vide, alors il n'y a pas eu d'erreur dans nos controles.
			
			// on vérifie si le pseudo est disponible.
			$verif_pseudo = $pdo->prepare("SELECT * FROM membre WHERE pseudo = :pseudo");
			$verif_pseudo->bindParam(":pseudo", $pseudo, PDO::PARAM_STR);
			$verif_pseudo->execute();
			
			if($verif_pseudo->rowCount() > 0) {
				// si le nombre de ligne est supérieur à zéro, alors le pseudo est déjà utilisé.
				$msg .= '<div class="alert alert-danger mt-3">Pseudo indisponible !</div>';	
			} else {
				// insert into
				// cryptage du mot de passe pour l'insertion en BDD
				$mdp = password_hash($mdp, PASSWORD_DEFAULT);
				
				// On déclenche l'insertion
$enregistrement = $pdo->prepare("INSERT INTO membre (id_membre, pseudo, mdp, nom, prenom, email, sexe, ville, cp, adresse, statut) VALUES (NULL, :pseudo, :mdp, :nom, :prenom, :email, :sexe, :ville, :cp, :adresse, 1)");
$enregistrement->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
$enregistrement->bindParam(':mdp', $mdp, PDO::PARAM_STR);
$enregistrement->bindParam(':nom', $nom, PDO::PARAM_STR);
$enregistrement->bindParam(':prenom', $prenom, PDO::PARAM_STR);
$enregistrement->bindParam(':email', $email, PDO::PARAM_STR);
$enregistrement->bindParam(':sexe', $sexe, PDO::PARAM_STR);
$enregistrement->bindParam(':ville', $ville, PDO::PARAM_STR);
$enregistrement->bindParam(':cp', $cp, PDO::PARAM_STR);
$enregistrement->bindParam(':adresse', $adresse, PDO::PARAM_STR);
$enregistrement->execute();

				
			}			
			
		}		
	
}



include 'inc/header.inc.php';
include 'inc/nav.inc.php';
?>

	<div class="starter-template">
		<h1><i class="fas fa-ghost" style="color: #4c6ef5;"></i> Inscription <i class="fas fa-ghost" style="color: #4c6ef5;"></i></h1>
		<p class="lead"><?php echo $msg; ?></p>
	</div>

	<div class="row">
		<div class="col-12">
			<form method="post" action="">
				<div class="row">
					<div class="col-6">
					
					
					
					
					
<div class="form-group">
	<label for="pseudo">Pseudo</label>
	<input type="text" name="pseudo" id="pseudo" value="<?php echo $pseudo; ?>" class="form-control">
</div>
<div class="form-group">
	<label for="mdp">Mot de passe</label>
	<input type="text" name="mdp" id="mdp" value="" class="form-control">
</div>
<div class="form-group">
	<label for="nom">Nom</label>
	<input type="text" name="nom" id="nom" value="<?php echo $nom; ?>" class="form-control">
</div>
<div class="form-group">
	<label for="prenom">Prénom</label>
	<input type="text" name="prenom" id="prenom" value="<?php echo $prenom; ?>" class="form-control">
</div>
<div class="form-group">
	<label for="email">Email</label>
	<input type="text" name="email" id="email" value="<?php echo $email; ?>" class="form-control">
</div>
						
						
						
						
						
						
						
						
						
					</div>
					<div class="col-6">
					
<div class="form-group">
	<label for="sexe">Sexe</label>
	<select name="sexe" id="sexe" class="form-control">
		<option value="m">Homme</option>
		<option value="f" <?php if($sexe == 'f') { echo 'selected'; } ?> >Femme</option>
	</select>
</div>
<div class="form-group">
	<label for="ville">Ville</label>
	<input type="text" name="ville" id="ville" value="<?php echo $ville; ?>" class="form-control">
</div>
<div class="form-group">
	<label for="cp">Code postal</label>
	<input type="text" name="cp" id="cp" value="<?php echo $cp; ?>" class="form-control">
</div>		
<div class="form-group">
	<label for="adresse">Adresse</label>
	<textarea name="adresse" id="adresse" rows="2" class="form-control"><?php echo $adresse; ?></textarea>
</div>			
<div class="form-group">
	<button type="submit" name="inscription" id="inscription" class="form-control btn btn-outline-primary"> Inscription </button>
</div>					
					
					
					
					</div>
				</div>
			</form>			
		</div>
	</div>


<?php 
include 'inc/footer.inc.php';