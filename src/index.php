<?php
require_once('GetData.php');
require_once('CreateJPG.php');

/**
 * Get Weather data from OpenWeathermap
 */
$weather = new getData();
$weatherData = $weather->fetchData();

/**
 * Create jpg image with weather data
 */
$instaJPG = new CreateJPG();
$instaJPG->generateJPG($weatherData);
