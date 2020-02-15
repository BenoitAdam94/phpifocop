<ul>
    <li><a href="liens.fruit.php?fruits=bananes">Bananes</a></li>
    <li><a href="liens.fruit.php?fruits=pommes">Pommes</a></li>
    <li><a href="liens.fruit.php?fruits=peches">Peches</a></li>
    <li><a href="liens.fruit.php?fruits=cerises">Cerises</a></li>
</ul>

<?php



if(
            isset($_GET['fruits'])) {
                $fruits = $_GET['fruits'];
                include 'functions.inc.php';
                echo calcul($fruits, 1000);
            }
