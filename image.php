<?php

echo '<img src="img/image1.jpg">';

/*
for ($i=1 ; $i <=5 ; $i++) {
    echo '<img src="img/image1.jpg">';
}
*/
/*
for ($i=1 ; $i <=5 ; $i++) {
    echo '<img src="img/image' . $i . '.jpg">';
}*/


// dans un tableau array
$images = array('img/image1.jpg',
                'img/image2.jpg',
                'img/image3.jpg',
                'img/image4.jpg',
                'img/image5.jpg');

var_dump($images);

foreach($images AS $ligne) {
    echo '<img src="' . $ligne . '" width="300" >';
    }
    

echo rand(1 ,5);
echo '<hr>';
echo '<img src="img/image' . rand(1,5) . '.jpg" width="300" >';
echo '<hr>';
echo '<img src="' . $images[rand(0,4)] . '" width="300" >';

?>