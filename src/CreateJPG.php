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
        // Select useful weather Data into variables
        $currentTemp = $weatherData->current->temp;
        $currentTempFeel = $weatherData->current->feels_like;
        $weatherDescriptionToday = $weatherData->daily[0]->weather[0]->description;
        $icon = $weatherData->daily[0]->weather[0]->icon;
        $tempMorning = $weatherData->daily[0]->temp->morn;
        $tempDay = $weatherData->daily[0]->temp->day;
        $tempEvening = $weatherData->daily[0]->temp->eve;
        $tempNight = $weatherData->daily[0]->temp->night;
        $humidityToday = $weatherData->daily[0]->humidity;

        // Create image depending on weather
        // TODO correct if condition string
        if (str_contains($weatherDescriptionToday, "sonne")) {
            $image = imagecreatefrompng('../templates/template_sun.png');
        } else if (str_contains($weatherDescriptionToday, "regen")) {
            $image = imagecreatefrompng('../templates/template_rain.png');
        } else {
            $image = imagecreatefrompng('../templates/template_cloudy.png');
        }


        // Set Text color to black
        $textColor = imagecolorallocate($image, 255, 255, 255);

        // Set background of image white
        $white = imagecolorallocate($image, 255, 255, 255);
        imagefill($image, 0, 0, $white);

        // Text to show in image
        $text = "\nAktuelle Temperatur: $currentTemp °\n\nGefühlte Temperatur: $currentTempFeel °\n\n$weatherDescriptionToday\n\n\nWetter am Morgen: $tempMorning °\n\n\nWetter am Mittag: $tempDay °\n\n\nWetter am Abend: $tempEvening °\n\n\nWetter in der Nacht: $tempNight °\n\n\nHeutige Luftfeuchtigkeit: $humidityToday %";

        // Set text and position to image
        imagettftext($image, 30, 0, 50, 50, $textColor, "exprswy_free.ttf", $text);

        // Create jpg
        imagejpeg($image, 'weather.jpg');

        imagedestroy($image);

    }
}