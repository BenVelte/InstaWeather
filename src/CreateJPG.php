<?php

class CreateJPG
{
    /**
     * Get useful weather data and generate JPG image
     * @param object $weatherData
     * @return void
     */
    public function GenerateJPG(object $weatherData)
    {
        $currentTemp = $weatherData->current->temp;
        $currentTempFeel = $weatherData->current->feels_like;
        $weatherDescriptionToday = $weatherData->daily[0]->weather[0]->description;
        $icon = $weatherData->daily[0]->weather[0]->icon;
        $tempMorning = $weatherData->daily[0]->temp->morn;
        $tempDay = $weatherData->daily[0]->temp->day;
        $tempEvening = $weatherData->daily[0]->temp->eve;
        $tempNight = $weatherData->daily[0]->temp->night;
        $humidityToday = $weatherData->daily[0]->humidity;
        echo $currentTemp;

        // TODO generate JPG image from data, lol

    }
}