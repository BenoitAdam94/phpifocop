<?php
include 'inc/init.inc.php';
include 'inc/function.inc.php';

// deconnection
if(isset($_GET['action']) && $_GET['action'] == 'deconnexion') {
  session_destroy();
}

// Tools for debug
include 'inc/tools.inc.php';
// debug();

if (user_is_connect()) {
  header('location:profil.php');
}

$pseudo = '';
$mdp = '';


//on controle l'existence des champs du formulaire
if (
  isset($_POST['pseudo']) &&
  isset($_POST['mdp'])
) {

  $pseudo = trim($_POST['pseudo']);
  $mdp    = trim($_POST['mdp']);

  $verif_connexion = $pdo->prepare("SELECT * FROM membre WHERE pseudo = :pseudo");
  $verif_connexion->bindParam(":pseudo", $pseudo, PDO::PARAM_STR);
  $verif_connexion->execute();


  if ($verif_connexion->rowCount() > 0) {
    $infos = $verif_connexion->fetch(PDO::FETCH_ASSOC);

    if (password_verify($mdp, $infos['mdp'])) {
      // le pseudo et le mdp sont correct on enregistre les info du membre dans la session;


      $_SESSION['membre'] = array();
      $_SESSION['membre']['id_membre'] = $infos['id_membre'];
      $_SESSION['membre']['pseudo'] = $infos['pseudo'];
      $_SESSION['membre']['nom'] = $infos['nom'];
      $_SESSION['membre']['prenom'] = $infos['prenom'];
      $_SESSION['membre']['sexe'] = $infos['sexe'];
      $_SESSION['membre']['email'] = $infos['email'];
      $_SESSION['membre']['ville'] = $infos['ville'];
      $_SESSION['membre']['cp'] = $infos['cp'];
      $_SESSION['membre']['adresse'] = $infos['adresse'];
      $_SESSION['membre']['statut'] = $infos['statut'];

      /*
              // avec un foreach()
              foreach($infos AS $indice => $valeur) {
                if($indice != 'mdp'){
                  $_SESSION['membre'][$indice] = $valeur;
                }
              }*/

      // maintenant que l'utilisateur est connecté on le redirige vers profil.php
      header('location:profil.php');
    } else {

      $msg .= 'erreur mot de passe invalide';
    }
  } else {

    $msg .= 'erreur pseudo invalide';
  }
}


include 'inc/header.inc.php';
include 'inc/nav.inc.php';
// dump($_SESSION);
?>




<div class="starter-template">
  <h1><i class="fas fa-carrot" style="color: #4c6ef5;"></i> Connection <i class="fas fa-carrot" style="color: #4c6ef5;"></i></h1>
  <p class="lead"><?php echo $msg; ?></p>
</div>

<div class="row">
  <div class="col-12 mx-auto">
    <!-- Pseudo -->
    <form method="post">
      <div class="form-group">
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo" value="<?php echo "$pseudo"; ?>" class="form-control">
      </div>
      <!-- Mot de passe -->
      <div class="form-group">
        <label for="mdp">Mot de passe</label>
        <input type="password" name="mdp" id="mdp" value="<?php echo "$mdp"; ?>" class="form-control">
      </div>

      <button type="submit" name="connection" id="connection" class="form-control btn btn-outline-primary">Connection</button>
    </form>
  </div>
</div>

<?php
include 'inc/footer.inc.php';
?>