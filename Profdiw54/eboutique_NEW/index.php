<?php
include 'inc/init.inc.php';
include 'inc/fonction.inc.php';
$debug = 0;
include 'inc/tools.php';

// code ...
// recup categorie bdd
$liste_categorie = $pdo->query("SELECT DISTINCT categorie FROM article");

// recup article bdd
if(isset($_GET['categorie'])) {
	$choix_categorie = $_GET['categorie'];
	$liste_article = $pdo->prepare("SELECT * FROM article WHERE categorie = :categorie ORDER BY titre");
	$liste_article->bindParam(':categorie',$choix_categorie, PDO::PARAM_STR);
	$liste_article->execute();
} else {
	$liste_article = $pdo->query("SELECT * FROM article");
}



include 'inc/header.inc.php';
include 'inc/nav.inc.php';
?>

<div class="starter-template">
	<h1><i class="fas fa-ghost" style="color: #4c6ef5;"></i> INDEX <i class="fas fa-ghost" style="color: #4c6ef5;"></i></h1>
	<p class="lead"><?php echo $msg; ?></p>
</div>

<div class="row">
	<div class="col-3">
		<!-- recuperer la liste des catégories -->


		<?php



		// dump($liste_categorie);

		echo '<ul class="list-group">
					<li class="list-group-item active">Catégories</li>';
		echo '<li class="list-group-item"><a href="' .URL . '">Tous les produits</a></li>';

		while ($categorie = $liste_categorie->fetch(PDO::FETCH_ASSOC)) { // Fetch = transforme en tableau array
			echo '<li class="list-group-item">';
			echo '<a href="?categorie=' . $categorie['categorie'] . '">';
			echo $categorie['categorie'];
			echo '</a></li>';
		}
		echo '</ul>';


		?>
	</div>
	<div class="col-9">
		<div class="row justify-content-around">
			<?php
			while ($article = $liste_article->fetch(PDO::FETCH_ASSOC)) {
				//dump($article);
				echo '<div class="col-sm-4 text-center p-2">';
				echo "<h5>";
				echo $article['titre'];
				echo "</h5>";
				echo '<img src="' . URL . 'img/' . $article['photo'] . '" alt="' . $article['titre'] . '" class="img-thumbnail w-100">';
				// echo $article['categorie'];

				echo '<p>Catégorie : <b>' . $article['categorie'] . '</b></p>';
				echo '<p>Prix : <b>' . $article['prix'] . '</b></p>';

				echo '<a href="fiche_article.php?id_article=' . $article['id_article'] . '" class="btn btn-primary w-100">Fiche Article</a><hr>';
				echo '</div>';
			}

			?>
		</div>

	</div>
</div>


<?php
include 'inc/footer.inc.php';
