<!DOCTYPE html>
<html lang="FR_fr">
    <head>
        <!-- Title-->
        <title>Formulaire</title>
        <!-- Charset in HTML5 -->
        <meta charset="UTF-8">
        <!-- Meta Description -->
        <meta name="description" content="description du contenu">
        <!-- Configuration du référencement de la page (Robots)-->
        <meta name="robots" content="index, follow">
        <!-- Responsive Design -->
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <!-- Meta Google Search Console -->
        <meta name="google-site-verification" content="Clef fournie par Google">
        <!-- CSS -->
        <link rel="stylesheet" href="style.css">
        <style>
        
        </style>
    </head>
    <body>
        <div class="conteneur">
            <form method="post">
                <?php
                    echo 'pre'; var_dump($_POST);echo'</pre>';

                if(
                    isset($_POST['pseudo']) &&
                    isset($_POST['description'])
                    ) {
                        echo "Pseudo = $_POST[pseudo] <br>description = $_POST[description]<hr>";        
                    }
                ?>
                <!--
                method="post" => la 

                action="" => url cible lors de la validation

                enctype="multipârt/form-data" => obligatoire si PJ
                -->
                <h1>Formulaire 1</h1>
                <label for="pseudo">Pseudo</label>
                <input ype="text" name ="pseudo" id="pseudo">
                <br>
                <label for="description" id="description">Description</label>
                <textarea name="description" id="description"></textarea>
                <hr>
                <input type="submit" id="confirm" value="Confirmer">
            </form>
    </body>
</html>