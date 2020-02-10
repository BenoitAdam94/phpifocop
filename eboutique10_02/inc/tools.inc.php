<?php

// Cookies

$_1year_in_seconds = 31536000;
$_2year_in_seconds = 63072000;

function dump($dump) {
    echo '<pre>';
    var_dump($dump);
    echo '</pre>';
}

function sep() {
    echo '<hr>';
}

// Javascript Console for PHP

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

// Informations

function debug(){
    dump($_COOKIE);
    dump($_SERVER);
    dump($_POST);
    dump($_GET);
    }

?>