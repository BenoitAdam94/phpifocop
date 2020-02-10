<?php
include 'inc/init.inc.php';
include 'inc/function.inc.php';

if(!user_is_admin() ) {
  header('location:../connexion.php');
  exit();
}

// Tools for debug
include 'inc/tools.inc.php';
// debug();


include 'inc/header.inc.php';
include 'inc/nav.inc.php';
?>

  <div class="starter-template">
    <h1><i class="fas fa-carrot" style="color: #4c6ef5;"></i> Template <i class="fas fa-carrot" style="color: #4c6ef5;"></i></h1>
    <p class="lead"><?php echo $msg;?></p>
  </div>

	<div class="row">
		<div class="col-12">
			
		</div>
	</div>

<?php
include 'inc/footer.inc.php';
?>