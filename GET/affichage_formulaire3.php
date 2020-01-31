<?php



if(
            isset($_POST['destinataire']) &&
            isset($_POST['expediteur']) &&
            isset($_POST['sujet']) &&
            isset($_POST['message'])) {

                $destinataire = trim($_POST['destinataire']);
                $expediteur = trim($_POST['expediteur']);
                $sujet = trim($_POST['sujet']);
                $message = trim($_POST['message']);

                $expediteur = 'From: ' . $expediteur;

                mail($destinataire, $sujet, $message, $expediteur);
                // mail('mail@mail.fr', $sujet, $message, $expediteur);


            }


?>