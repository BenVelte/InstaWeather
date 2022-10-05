<?php

require '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createMutable(__DIR__, '/../.env');
$dotenv->load();

class GetData
{

    /**
     * @var string Language
     */
    private string $lang = "de";

    /**
     * @var string Unit
     */
    private string $unit = "metric";

    /**
     * Fetch weather data from Openweathermap API
     * @return object Weather data
     */
    public function fetchData(): object
    {
        $apiKey = $_ENV['WEATHER_API_KEY'];
        $lat = $_ENV['LATITUDE'];
        $lon = $_ENV['LONGITUDE'];


        $weatherData = file_get_contents("https://api.openweathermap.org/data/2.5/onecall?lat=$lat" .
            "&lon=$lon&appid=$apiKey&units=$this->unit&lang=$this->lang");


        return json_decode($weatherData);
    }
}