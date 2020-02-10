<?php
// Exercice : faire une liste ul li avec les fruits suivants en lien : bananes, pommes, peches, cerises
// Si l'utilisateur clic sur un lien, il faut afficher son prix au kilo.
include 'functions.inc.php';
$message = '';
if(isset($_GET['choix'])) {
	$message = calcul($_GET['choix'], 1000);
}
?>
<h1>Veuillez cliquer sur un fruit pour connaitre son prix au kilo</h1>

<?php echo $message; ?>
<ul>
	<li><a href="?choix=bananes">Bananes</a></li>
	<li><a href="?choix=pommes">Pommes</a></li>
	<li><a href="?choix=peches">Pêches</a></li>
	<li><a href="?choix=cerises">Cerises</a></li>
</ul>


