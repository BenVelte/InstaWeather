<?php
require_once('GetData.php');
require_once('CreateJPG.php');

$weather = new getData();
$weatherData = $weather->fetchData();

$instaJPG = new CreateJPG();
$instaJPG->generateJPG($weatherData);
