<?php

class CreateJPG
{
    /**
     * Get useful weather data and generate JPG image
     * @param object $weatherData
     * @return void
     */
    public function generateJPG(object $weatherData): void
    {
        // Select useful weather Data into variables
        $currentTemp = round($weatherData->current->temp, 1);
        $currentTempFeel = round($weatherData->current->feels_like, 1);
        $weatherDescriptionToday = $weatherData->daily[0]->weather[0]->description;
        $icon = $weatherData->daily[0]->weather[0]->icon;
        $tempMorning = round($weatherData->daily[0]->temp->morn, 1);
        $tempDay = round($weatherData->daily[0]->temp->day, 1);
        $tempEvening = round($weatherData->daily[0]->temp->eve, 1);
        $tempNight = round($weatherData->daily[0]->temp->night, 1);
        $humidityToday = $weatherData->daily[0]->humidity;
        $weatherId = $weatherData->daily[0]->weather[0]->id;

        // Create image depending on weather
        if ($weatherId === 800 || $weatherId === 801 || $weatherId === 802 || $weatherId === 803) {
            $image = imagecreatefrompng('../templates/template_sun.png');
        } else if (str_contains($weatherDescriptionToday, "Regen")) {
            $image = imagecreatefrompng('../templates/template_rain.png');
        } else {
            $image = imagecreatefrompng('../templates/template_cloudy.png');
        }


        // Set Text color to white
        $textColor = imagecolorallocate($image, 255, 255, 255);

        // Text to show in image
        $text = "\nAktuelle Temperatur: $currentTemp °\n\nGefühlte Temperatur: $currentTempFeel °\n\n" .
            "$weatherDescriptionToday\n\n\nTemperatur am Morgen: $tempMorning °\n\nTemperatur am Mittag: $tempDay °\n\n" .
            "Temperatur am Abend: $tempEvening °\n\nTemperatur in der Nacht: $tempNight °\n\n\n" .
            "Heutige Luftfeuchtigkeit: $humidityToday %";


        // Set text and position to image
        imagettftext($image, 30, 0, 50, 50, $textColor, "exprswy_free.ttf", $text);

        // Create jpg
        imagejpeg($image, '../weather.jpg');

        imagedestroy($image);

    }
}