<?php

// get est un protocole HTTP
// l'outil php est une superglobale => $_GET
// les superglobales sont des tableaux ARRAY
// $_GET existe toujours

// echo '<pre>'; var_dump($_GET); echo '</pre>';

// echo 'Larticle est'

?>


<h1>Page 2</h2>

<a href="page1.php"> lien vers la page 1</a><hr>

<?php

if(
    isset($_GET['article']) &&
    isset($_GET['couleur']) &&
    isset($_GET['quantite']) &&
    isset($_GET['prix'])
    ) {
        echo "L'article est un $_GET[article] de couleur $_GET[couleur] nous en avons $_GET[quantite] en stock pour un prix de $_GET[prix] €<hr>";        
    }



foreach($_GET AS $i => $v) {
    echo ucfirst($i) . ' : ' . $v . '<br>';
}

// syntaxe dans l'url pour passer des infos dans GET
// si il y a un ? dans l'url

?>