<?php

function d_bug($nom){
    echo '<pre>';
    var_dump($nom);
    echo '</pre>';
}

function d_dump($ddump) {
    echo '<pre>';
    var_dump($ddump);
    echo '</pre>';
}

function sep() {
    echo '<hr>';
}

$liste = array('jaune', 'rouge', 'bleu', 'vert');

$couleur = "bleu";


d_dump($liste);

sep();

function js($js) {
    echo '<script>';
    echo "console.log('$js');";
    echo '</script>';
}

function info($js) {
    echo '<script>';
    echo "console.info('$js');";
    echo '</script>';
}

js('test');

info('info');