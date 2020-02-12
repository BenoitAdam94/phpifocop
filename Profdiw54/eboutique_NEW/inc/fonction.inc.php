<?php
// fonction pour savoir si l'utilisateur est connecté
function user_is_connect() {
	if(!empty($_SESSION['membre'])) {
		return true; // utilisateur est connecté
	}
	return false; // utilisateur n'est pas connecté
}


// fonction pour savoir si l'utilisateur a le statut d'admin
function user_is_admin() {
	if(user_is_connect() && $_SESSION['membre']['statut'] == 2) {
		// si l'utilisateur est connecté et que son statut est égal à 2 alors il est admin
		return true;
	} else {
		return false;
	}
}
//fonction pour créer le panier
function creation_panier() {
	if(!isset($_SESSION['panier'])) {
		$_SESSION['panier'] = array();
		$_SESSION['panier']['id_article'] = array();
		$_SESSION['panier']['titre'] = array();
		$_SESSION['panier']['prix'] = array();
		$_SESSION['panier']['quantite'] = array();
	}
}

//fonction pour ajouter un article au panier
function ajout_panier($id_article, $quantite, $prix, $titre) {
	// si un article existe déjà dans le panier on ne change que sa quantité sinon on le rajoute

	// on verifie si l'id_article est déjà présent dans le sous tableau $_SESSION panier id article
	// array search() cherche une info dans les valeurs d'un tableau ARRAY et nous renvoie son indic, ensuite grave à l'indice on modifiera la quantité
	$position_article = array_search($id_article, $_SESSION['panier']['id_article']);

	if($position_article !== false) {
		$_SESSION['panier']['quantite'][$position_article] += $quantite;
	} else {
		$_SESSION['panier']['id_article'][] = $id_article;
		$_SESSION['panier']['quantite'][] = $quantite;
		$_SESSION['panier']['prix'][] = $prix;
		$_SESSION['panier']['titre'][] = $titre;
	}
}

//Fonction pour retrir un article du panier
function retirer_article($id_article) {
	$position_article = array_search($id_article, $_SESSION['panier']['id_article']);

	if($position_article !== false) {
		// array_splice permet d'enelever un element d'un tableau array mais aussi de réordonner les indices du tableaux pour ne plus avoir de trous
		array_splice($_SESSION['panier']['id_article'], $position_article, 1);
		array_splice($_SESSION['panier']['titre'], $position_article, 1);
		array_splice($_SESSION['panier']['prix'], $position_article, 1);
		array_splice($_SESSION['panier']['quantite'], $position_article, 1);

	}
}

function total_panier() {
	$total = 0;
	for($i = 0; $i < count($_SESSION['panier']['id_article']); $i++) {
		$total += $_SESSION['panier']['quantite'][$i] * $_SESSION['panier']['prix'][$i];
	}
	$total = $total * 1.2;
	return round($total, 2);
}
