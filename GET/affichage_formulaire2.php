<?php



if(
            isset($_POST['pseudo']) &&
            isset($_POST['email'])) {
                
                $error = 0; // variable de controle

                $pseudo = trim($_POST['pseudo']);
                $email = trim($_POST['email']);

                $taille_pseudo = iconv_strlen($pseudo);

                if ($taille_pseudo > 4 && $taille_pseudo < 15) {
                    echo "Le pseudo est $pseudo <br>";
                    }
                else {
                    echo "erreur $pseudo format non valide<br>";
                    $error = 1;
                    }
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    echo "mail non valide<br>";
                    $error = 1;
                }
                else {
                    echo "Votre mail : $email<br>";
                }
                if($error == 0) {

                    // Creation fichier sur serveur
                    $f = fopen('liste.txt', 'a');
                    
                    // fwrite = écrire
                    fwrite($f, $pseudo . ' - ' . $email . "\n"); // \n = retour à la ligne

                    // fclose($f);
                    fclose($f);

                }
            }

if(file_exists('liste.txt')) {
    $contenu = file('liste.txt');

    // Tableau array

    echo 'pre'; var_dump($contenu);echo'</pre>';


    // dans un li (boucle FOR)
    echo '<ul>';
    $taille_array = sizeof($contenu);
    for($i = 0 ; $i < $taille_array ; $i++) {
        echo "<li>$contenu[$i]</li>";
    }
    echo '</ul>';

    // dans un li (FOREACH)
    echo '<ul>';
    foreach ($contenu AS $ligne) {
        echo "<li>$ligne</li>";
    }
    echo '</ul>';

}


?>