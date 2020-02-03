<?php

function dump($dump) {
    echo '<pre>';
    var_dump($dump);
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