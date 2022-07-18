<?php

class PostImage
{

    /**
     * @var int Instagram User ID
     */
    private int $userId = 53910325761;

    /**
     * Publish Image on Instagram wettersolms
     * @param string $content
     * @return void
     */
    public function publishWeather(string $content): void
    {
        // Current date at post
        $date = date("Y.m.d");

        // Post url für Container
        $url = "https://graph.facebook.com/v14.0/$this->userId/media?image_url=$content&caption=Wetter in Solms vom $date";
    }

}