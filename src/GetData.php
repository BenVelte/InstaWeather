<?php

class GetData
{
    /**
     * @var float Latitude fetch
     */
    private float $lat = 50.7667;

    /**
     * @var float Longitude fetch
     */
    private float $lon = 9.6;

    /**
     * @var string Language fetch
     */
    private string $lang = "de";

    /**
     * @var string Unit fetch
     */
    private string $unit = "metric";


    /**
     * Get local API key
     * @return string API Key
     */
    private static function getAPIKey(): string
    {
        return file_get_contents('./APIKey.txt');
    }

    /**
     * Fetch weather data from Openweathermap API
     * @return object Weather data
     */
    public function fetchData(): object
    {
        $apiKey = $this->getAPIKey();
        $weatherData = file_get_contents("https://api.openweathermap.org/data/2.5/onecall?lat=$this->lat&lon=$this->lon&appid=$apiKey&units=$this->unit&lang=$this->lang");

        return json_decode($weatherData);
    }
}