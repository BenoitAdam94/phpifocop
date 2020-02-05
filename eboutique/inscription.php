<?php
include 'inc/init.inc.php';
include 'inc/function.inc.php';

// Tools for debug
include 'inc/tools.inc.php';
// debug();


$pseudo= '';
$mdp='';
$prenom='';
$nom='';
$email='';
$sexe='';
$ville='';
$cp='';
$adresse='';

//on controle l'existence des champs du formulaire
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

    $pseudo = $_POST['pseudo'];
    $mdp     = $_POST['mdp'];
    $prenom  = $_POST['prenom'];
    $nom     = $_POST['nom'];
    $email   = $_POST['email'];
    $sexe    = $_POST['sexe'];
    $ville   = $_POST['ville'];
    $cp      = $_POST['cp'];
    $adresse = $_POST['adresse'];

    // On bloque les charactères disponible pour le champ pseudo via une expression régulière (regex). On autorise uniquement a-z A-Z 0-9 -._

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
      $msg .= '<div class="alert alert-danger mt-3">Pseudo Invalide,caractères autorisés : a-z et de 0-9</div>';
    }

    // verifier la taille du pseudo => Message d'erreur si pseudo n'est ps entre 4 et 14 caractèrees inclus

    if((iconv_strlen($pseudo) < 4 || iconv_strlen($pseudo) > 14 ))
      {
        $msg = '<div class="alert alert-danger mt-3">Pseudo Invalide, entre 4 et 14 charactères</div>';
      }

    // sur la validité de l'email


    // si pas d'erreur au préalable on doit verifier si le pseudo existe déjà dans la bdd
    if(empty($msg)) {
      // si la variable $msg est vide, alors il n'y a pas eu d'erreur dans nos controles

      // on vérifie si le pseudo est dispo.
      $verif_pseudo = $pdo->prepare("SELECT * FROM membre WHERE pseudo = :pseudo");
      $verif_pseudo->bindParam(":pseudo",$pseudo, PDO::PARAM_STR);
      $verif_pseudo->execute();

      if($verif_pseudo->rowCount() >0) {
        // si le nombre de ligne est supérieur à zéro, alors le pseudo est déjà utilisé.
        $msg .= '<div class="alert alert-danger mt-3">Pseudo Indisponible</div>';
      } else {

        $pdo->prepare(INSERT INTO `membre` (`id_membre`, `pseudo`, `mdp`, `nom`, `prenom`, `email`, `sexe`, `ville`, `cp`, `adresse`, `statut`) VALUES (NULL, 'adam', '', '', '', '', 'm', '', '', '', ''))

      }
    }

  }


include 'inc/header.inc.php';
include 'inc/nav.inc.php';
?>

  <div class="starter-template">
    <h1><i class="fas fa-carrot" style="color: #4c6ef5;"></i> Template <i class="fas fa-carrot" style="color: #4c6ef5;"></i></h1>
    <p class="lead"><?php echo $msg;?></p>
  </div>

	<div class="row">
		<div class="col-12">
			<form method="post" action="">
        <div class="row">
          <div class="col-6">
            <!-- Pseudo -->
            <div class="form-group">
              <label for="pseudo">Pseudo</label>
              <input type="text" name="pseudo" id="pseudo" value="<?php echo "$pseudo";?>" class="form-control">
            </div>
            <!-- Mot de passe -->
            <div class="form-group">
              <label for="mdp">Mot de passe</label>
              <input type="password" name="mdp" id="mdp" value="<?php echo "$mdp";?>" class="form-control">
            </div>
            <!-- Prenom -->
            <div class="form-group">
              <label for="nom">Nom</label>
              <input type="text" name="nom" id="nom" value="<?php echo "$nom";?>" class="form-control">
            </div>
            <!-- Prenom -->
            <div class="form-group">
              <label for="prenom">Prenom</label>
              <input type="text" name="prenom" id="prenom" value="<?php echo "$prenom";?>" class="form-control">
            </div>
            <!-- Email -->
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" name="email" id="email" value="<?php echo "$email";?>" class="form-control">
            </div>
            </div>
          <div class="col-6">
            <!-- Sexe -->
            <div class="form-group">
              <label for="sexe">Sexe</label>
              <select name="sexe" id="sexe" class="form-control">
                <option value="m">Homme</option>
                <option value="f" <?php if($sexe == 'f') { echo 'selected'; }?> >Femme</option>
              </select>
            </div>
            <!-- Ville -->
            <div class="form-group">
              <label for="ville">Ville</label>
              <input type="text" name="ville" id="ville" value="<?php echo "$ville";?>" class="form-control">
            </div>
            <!-- Code Postal -->
            <div class="form-group">
              <label for="cp">CP</label>
              <input type="text" name="cp" id="cp" value="<?php echo "$cp";?>" class="form-control">
            </div>
            <!-- Adresse -->
            <div class="form-group">
              <label for="adresse">Adresse</label>
              <textarea name="adresse" id="adresse" rows="2" class="form-control"><?php echo "$adresse";?></textarea>
            </div>

            <button type="submit" name="inscription" id="inscription" class="form-control btn btn-outline-primary">Inscription</button>
          
          </div>
        </div>
      </form>
      
		</div>
	</div>

<?php
include 'inc/footer.inc.php';
?>