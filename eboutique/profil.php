<?php
include 'inc/init.inc.php';
include 'inc/function.inc.php';

// Tools for debug
include 'inc/tools.inc.php';
// debug();

if (!user_is_connect()) {
  header('location:connexion.php');
}


include 'inc/header.inc.php';
include 'inc/nav.inc.php';
?>

<div class="starter-template">
  <h1><i class="fas fa-carrot" style="color: #4c6ef5;"></i> Profil <i class="fas fa-carrot" style="color: #4c6ef5;"></i></h1>
  <p class="lead"><?php echo $msg; ?></p>
</div>

<div class="row">
  <div class="col-12">
    <?php
    echo  $_SESSION['membre']['id_membre'] . '<br>';
    echo  ucfirst($_SESSION['membre']['pseudo']) . '<br>';
    echo  strtoupper($_SESSION['membre']['nom']) . '<br>';
    if ($_SESSION['membre']['sexe'] == "m") {
      echo "Homme <br>";
    } else {
      echo "Femme <br>";
    }
    echo "<hr>";
    echo "<table>";

    foreach ($_SESSION['membre'] as $ind => $val) {
      echo "<tr><th> $ind </th><th> $val </th></tr>";
    }
    echo "</table>";

    ?>

  </div>
</div>

<?php
include 'inc/footer.inc.php';
?>