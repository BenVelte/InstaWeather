<?php
require_once('GetData.php');

$weatherData = new getData();
$weatherData->fetchData();

//while(true) {
//    sleep(10000);
//}