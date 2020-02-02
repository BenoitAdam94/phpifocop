<?php



$couleur ='';

$tab = array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f');
echo '<pre>'; echo print_r($tab); echo '</pre>'; 

for ($i = 0; $i < 6; $i++) {
    $couleur .= $tab[rand(0 ,15)];
}

echo "$couleur";

?>

<body style="background-color: #<?php echo $couleur?>"></body>