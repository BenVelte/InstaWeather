<?php
require_once('GetData.php');
require_once('CreateJPG.php');

$weather = new getData();
$weatherData = $weather->fetchData();

$instaJPG = new CreateJPG();
$instaJPG->GenerateJPG($weatherData);

//while(true) {
//    sleep(10000);
//}