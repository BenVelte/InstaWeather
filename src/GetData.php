<?php

require '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createMutable(__DIR__, '/../.env');
$dotenv->load();

class GetData
{
    /**
     * @var float Latitude
     */
    private float $lat = 50.7667;

    /**
     * @var float Longitude
     */
    private float $lon = 9.6;

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

        $weatherData = file_get_contents("https://api.openweathermap.org/data/2.5/onecall?lat=$this->lat" .
            "&lon=$this->lon&appid=$apiKey&units=$this->unit&lang=$this->lang");


        return json_decode($weatherData);
    }
}