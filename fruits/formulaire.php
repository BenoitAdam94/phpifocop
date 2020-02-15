<form method="$_GET">
    <label for="fruits">
        <select name="fruits" id="fruits">
            <option>Bananes</option>
            <option>Cerises</option>
            <option>Peches</option>
            <option>Pommes</option>
        </select>
    </label>
    <br><br>
    <label for="poids"></label>
    <input type="number" name="poids" id="poids">
    <br><br>
    <button type="submit">Envoyer</button>
</form>

<hr>
<?php

if(
            isset($_GET['fruits'])) {
                $fruits = $_GET['fruits'];
                $poids= $_GET['poids'];
                include 'functions.inc.php';
                echo calcul($fruits, $poids);
            }

?>