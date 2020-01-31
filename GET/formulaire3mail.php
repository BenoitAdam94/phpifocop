<!DOCTYPE html>
<html lang="FR_fr">
    <head>
        <!-- Title-->
        <title>Formulaire 3</title>
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
            <form method="post" action="affichage_formulaire3.php">

                <h1>Formulaire 3</h1>
                <label for="destinataire">destinataire</label>
                <input ype="text" name ="destinataire" id="destinataire">
                <br>
                <label for="expediteur">expediteur</label>
                <input ype="text" name ="expediteur" id="expediteur">
                <br>
                <label for="sujet">sujet</label>
                <input ype="text" name ="sujet" id="sujet">
                <br>
                <label for="message" id="message">message</label>
                <textarea name="message" id="message"></textarea>
                <hr>
                <input type="submit" id="confirm" value="Confirmer">
            </form>
    </body>
</html>