<?php

function rand_hexa() {
    $rand = rand(0,15);
    if ($rand == 10){ $rand = 'a';}
    else if ($rand == 11){ $rand = 'b';}
    else if ($rand == 12){ $rand = 'c';}
    else if ($rand == 13){ $rand = 'd';}
    else if ($rand == 14){ $rand = 'e';}
    else if ($rand == 15){ $rand = 'f';}
    return $rand;
}

$couleur ='';
for ($i = 0; $i < 6; $i++) {
    $couleur .= rand_hexa();
}

echo "$couleur";


?>

<body style="background-color: #<?php echo $couleur?>"></body>