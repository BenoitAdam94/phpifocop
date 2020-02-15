<?php 
include 'inc/init.inc.php';
include 'inc/fonction.inc.php';
$debug = 0;
include 'inc/tools.php';


if(isset($_GET['action']) && $_GET['action'] == 'vider') {
	unset($_SESSION['panier']);

}

$erreur = 0;

//****** PAYER LE PANIER */

if(isset($_GET['action']) && $_GET['action'] == 'payer' && !empty($_SESSION['panier']['titre'])) {
	//il faut verifier le stock restant end BDD avec la quantité demandées pour chaque article du panier
	for($i = 0; $i < count($_SESSION['panier']['titre']); $i++) {
		//recuperation des infos pour verifier le stock
		$verif_stock = $pdo->prepare("SELECT * FROM article WHERE id_article = :id_article");
		$verif_stock ->bindParam(":id_article", $_SESSION['panier']['id_article'][$i], PDO::PARAM_STR);
		$verif_stock->execute();

		$infos_stock = $verif_stock->fetch(PDO::FETCH_ASSOC);

		if($infos_stock['stock'] < $_SESSION['panier']['quantite'][$i]) {

			$erreur = 1;

			if($infos_stock['stock'] > 0) {
				//il y a du stock mais moins que la quantité demandée
				$_SESSION['panier']['quantite'][$i] = $infos_stock['stock'];
				$msg .= 'le stock du produit n° ' . $_SESSION['panier']['id_article'][$i] . ' est insuffisant, nous avons changé la quantité de votre panier. <br><b> Veuillez vérifier votre panier </b></div>';
			} else {
				// Stock a zero
				$msg .= 'Rupture de stock pour le produit' . $_SESSION['panier']['id_article'][$i] . ', nous avons retiré le produit de votre panier';

				retirer_article($_SESSION['panier']['id_article'][$i]);

				//important
				$i--;

			}
		}
		
	}
	if($erreur != 1) {

		// si pas eu d'erreur sur les controles des stocks

		// enregistrement de la commande en BDD

		$pdo->query("INSERT INTO commande (id_membre, montant, date)
		VALUES (
			" . $_SESSION['membre']['id_membre'] . ",
			" . total_panier() . ",
			NOW())");

		$id_commande = $pdo->lastInsertId(); //on recupere l'id de la commande qui vient d'être créée.

		for($i = 0; $i < count($_SESSION['panier']['id_article']); $i++) {

			$id_en_cours = $_SESSION['panier']['id_article'][$i];
			$quantite_en_cours = $_SESSION['panier']['quantite'][$i];
			$prix_en_cours = $_SESSION['panier']['prix'][$i];

			$pdo->query("INSERT INTO details_commande (id_commande, id_article, quantite, prix) VALUES ($id_commande, $id_en_cours, $quantite_en_cours, $prix_en_cours)");

			// mise a jour des stocks
			$pdo->query("UPDATE article SET stock = stock - $quantite_en_cours WHERE id_article = $id_en_cours");
		}
	}
}




// creation du panier
creation_panier();

// recuperation des info de l'article (prix) dans la BDD
if(!empty($_POST['id_article']) && is_numeric($_POST['id_article']) && !empty($_POST['quantite']) && $_POST['quantite'] > 0) {
	$recup_infos = $pdo->prepare("SELECT * FROM article WHERE id_article = :id_article");
	$recup_infos->bindParam(":id_article", $_POST['id_article'], PDO::PARAM_STR);
	$recup_infos->execute();

	if($recup_infos->rowCount() > 0) {
		//ajout de l'article dans le panier
		$infos = $recup_infos->fetch(PDO::FETCH_ASSOC);

		ajout_panier($_POST['id_article'], $_POST['quantite'], $infos['prix'], $infos['titre']);
	}
}


include 'inc/header.inc.php';
include 'inc/nav.inc.php';
dump($_POST);
dump($_SESSION);
?>

	<div class="starter-template">
		<h1><i class="fas fa-ghost" style="color: #4c6ef5;"></i> Template <i class="fas fa-ghost" style="color: #4c6ef5;"></i></h1>
		<p class="lead"><?php echo $msg; ?></p>
	</div>

	<div class="row">
		<div class="col-12">
			<p>Nombre d'article : <?php echo count($_SESSION['panier']['id_article']); ?></p>
			<hr>
			<table class="table table-bordered">
				<tr>
					<th>N° Article</th>
					<th>Titre</th>
					<th>Quantite</th>
					<th>Prix Unitaire</th>
				</tr>
				<?php
					if(empty($_SESSION['panier']['prix'])) {
						echo '<tr><td colspan="4">Votre Panier est vide</td></tr>';
						} else {
							for($i = 0; $i < count($_SESSION['panier']['titre']); $i++) {
								echo '<tr>';

								echo '<td>' . $_SESSION['panier']['id_article'][$i] . '</td>';
								echo '<td>' . $_SESSION['panier']['titre'][$i] . '</td>';
								echo '<td>' . $_SESSION['panier']['quantite'][$i] . '</td>';
								echo '<td>' . $_SESSION['panier']['prix'][$i] . '</td>';

								echo '</tr>';
							}
						
						// bouton vider le panier
						echo '<tr><td colspan="4"><a href="?action=vider" class="w-100 btn btn-danger">Vider le panier</a></td></tr>';
						}

						echo '<tr><td colspan="4">Montant total du panier : ' . total_panier() . ' €</td></tr>';
						// bouton vider le panier
						echo '<tr><td colspan="4"><a href="?action=vider" class="w-100">Vider le panier</tr></td>';

						// Si l'utilisateur est connecté : un bouton "Payer le panier" (?action=payer)
						// Sinon veuillez vous connecter ou vous inscrire pour payer le panier

						if(user_is_connect()) {
								?>

								<tr>
									<td colspan="4"><a href="?action=payer" class="w-100 btn btn-danger">Payer</a></td></tr>
								</tr>

								<?php
						} else {
							?>
							<tr>
								<td colspan="4">Veuillez vous <a href="connexion.php">connecter</a> ou vous <a href="inscription.php">inscrire</a> pour payer le panier
							</tr>

							<?php
						}
				?>
				
			</table>
		</div>
	</div>


<?php 
include 'inc/footer.inc.php';