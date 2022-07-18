<?php
require_once('GetData.php');
require_once('CreateJPG.php');
require_once('PostImage.php');

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

/**
 * Post Image on Instagram
 */
$post = new PostImage();
//$post->publishWeather('./weather.jpg');
