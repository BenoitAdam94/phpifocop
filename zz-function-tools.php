<?php

function dump($ddump) {
    echo '<pre>';
    var_dump($ddump);
    echo '</pre>';
}

function sep() {
    echo '<hr>';
}

function js($js) {
    echo '<script>';
    echo "console.log('PHP LOG == ' + '$js');";
    echo '</script>';
}

function info($js) {
    echo '<script>';
    echo "console.info('PHP INFO == ' + '$js');";
    echo '</script>';
}

?>

$liste = array('jaune', 'rouge', 'bleu', 'vert');

$couleur = "bleu";


dump($liste);

sep();


js('test');

info('info');
?>
<hr>
Totototototototo