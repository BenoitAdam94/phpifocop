<?php
include '../inc/init.inc.php';
include '../inc/function.inc.php';

if (!user_is_admin()) {
  header('location:../connexion.php');
  exit();
}

$reference = "";
$titre = "";
$categorie = "";
$couleur = "";
$taille = "";
$sexe = "";
$photo_bdd = "";
$prix = "";
$stock = "";
$description = "";

if (
  isset($_POST['reference']) &&
  isset($_POST['titre']) &&
  isset($_POST['categorie']) &&
  isset($_POST['couleur']) &&
  isset($_POST['taille']) &&
  isset($_POST['sexe']) &&
  isset($_POST['prix']) &&
  isset($_POST['stock']) &&
  isset($_POST['description'])
) {

  $reference = trim($_POST['reference']);
  $titre = trim($_POST['titre']);
  $categorie = trim($_POST['categorie']);
  $couleur = trim($_POST['couleur']);
  $taille = trim($_POST['taille']);
  $sexe = trim($_POST['sexe']);
  $photo_bdd = trim($_POST['photo_bdd']);
  $prix = trim($_POST['prix']);
  $stock = trim($_POST['stock']);
  $description = trim($_POST['description']);
}


// Tools for debug
include '../inc/tools.inc.php';
// debug();


include '../inc/header.inc.php';
include '../inc/nav.inc.php';
?>

<div class="starter-template">
  <h1><i class="fas fa-carrot" style="color: #4c6ef5;"></i> Template <i class="fas fa-carrot" style="color: #4c6ef5;"></i></h1>
  <p class="lead"><?php echo $msg; ?></p>
</div>

<div class="row">
  <div class="col-12">
    <form method="post" action="" enctype="multipart/form-data">
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label for="reference">Référence</label>
            <input type="text" name="reference" id="reference" value="<?php echo $reference; ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" name="titre" id="titre" value="<?php echo $titre; ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="2" class="form-control"><?php echo $description; ?></textarea>
          </div>
          <div class="form-group">
            <label for="categorie">Catégorie</label>
            <select name="categorie" id="categorie" class="form-control">
              <option <?php if ($categorie == 'Chemise') {
                        echo "selected";
                      } ?>>Chemise</option>
              <option <?php if ($categorie == 'T-shirt') {
                        echo "selected";
                      } ?>>T-shirt</option>
              <option <?php if ($categorie == 'Pantalon') {
                        echo "selected";
                      } ?>>Pantalon</option>
              <option <?php if ($categorie == 'Caleçon') {
                        echo "selected";
                      } ?>>Caleçon</option>
              <option <?php if ($categorie == 'Echape') {
                        echo "selected";
                      } ?>>Echarpe</option>
              <option <?php if ($categorie == 'Chaussettes') {
                        echo "selected";
                      } ?>>Chaussettes</option>
              <option <?php if ($categorie == 'Polo') {
                        echo "selected";
                      } ?>>Polo</option>
            </select>
          </div>
          <div class="form-group">
            <label for="couleur">Couleur</label>
            <select name="couleur" id="couleur" class="form-control">
              <option>Bleu</option>
              <option <?php if ($couleur == 'Blanc') {
                        echo "selected";
                      } ?>>Blanc</option>
              <option <?php if ($couleur == 'Vert') {
                        echo "selected";
                      } ?>>Vert</option>
              <option <?php if ($couleur == 'Rouge') {
                        echo "selected";
                      } ?>>Rouge</option>
              <option <?php if ($couleur == 'Gris') {
                        echo "selected";
                      } ?>>Gris</option>
              <option <?php if ($couleur == 'Rose') {
                        echo "selected";
                      } ?>>Rose</option>
              <option <?php if ($couleur == 'Beige') {
                        echo "selected";
                      } ?>>Beige</option>
              <option <?php if ($couleur == 'Marron') {
                        echo "selected";
                      } ?>>Marron</option>
              <option <?php if ($couleur == 'Jaune') {
                        echo "selected";
                      } ?>>Jaune</option>
            </select>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label for="taille">Taille</label>
            <select name="taille" id="taille" class="form-control">
              <option <?php if ($taille == 'XS') {
                        echo "selected";
                      } ?>>XS</option>
              <option> <?php if ($taille == 'S') {
                          echo "selected";
                        } ?>S</option>
              <option <?php if ($taille == 'M') {
                        echo "selected";
                      } ?>>M</option>
              <option <?php if ($taille == 'L') {
                        echo "selected";
                      } ?>>L</option>
              <option <?php if ($taille == 'XL') {
                        echo "selected";
                      } ?>>XL</option>
            </select>
          </div>
          <div class="form-group">
            <label for="sexe">Sexe</label>
            <select name="sexe" id="sexe" class="form-control">
              <option value="m">Homme</option>
              <option value="f" <?php if ($sexe == 'f') {
                                  echo 'selected';
                                } ?>>Femme</option>
            </select>
          </div>
          <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" name="photo" id="photo" class="form-control">
          </div>
          <div class="form-group">
            <label for="prix">Prix</label>
            <input type="text" name="prix" id="prix" value="<?php echo $prix; ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="stock">Stock</label>
            <input type="text" name="stock" id="stock" value="<?php echo $stock; ?>" class="form-control">
          </div>
          <div class="form-group">
            <button type="submit" name="enregistrement" id="enregistrement" class="form-control btn btn-outline-dark"> Enregistrement </button>
          </div>
        </div>
      </div>
    </form>

  </div>
</div>

<?php
include '../inc/footer.inc.php';
?>