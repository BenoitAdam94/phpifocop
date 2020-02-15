<?php 
include 'inc/init.inc.php';
include 'inc/fonction.inc.php';

	// code ...
if(isset($_GET['id_article'])) {
	header('location:index.php');
}

$infos_article = $pdo->prepare("SELECT * FROM article WHERE id_article = :id_article");
$infos_article->bindParam(':id_article', $_GET['id_article'], PDO::PARAM_STR);
$infos_article->execute();

/*
if($infos_article->rowCount() <1) {
	header('location:index.php');
}
*/

lorem



include 'inc/header.inc.php';
include 'inc/nav.inc.php';
dump($article);
?>



<div class="starter-template">
    <h1><i class="fas fa-ghost" style="color: #4c6ef5;"></i> Template <i class="fas fa-ghost" style="color: #4c6ef5;"></i></h1>
    <p class="lead"><?php echo $msg; ?></p>
</div>

<div class="row">
    <div class="col-6"></div>
    <div class="col-6">
        <img src="" alt="<?= URL . 'img/' . $article['photo']; ?>" alt="<?= $article['titre']; ?>" class="w-100 img-thumbnail">
    </div>
</div>


<?php 
include 'inc/footer.inc.php';