<?php

class PostImage
{

    /**
     * Upload image to ImgBB public Server
     * @return string Public URL to img
     */
    private function uploadImgToServer(): string
    {
        $API_KEY = $_ENV['IMGBB_API_KEY'];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.imgbb.com/1/upload?key='.$API_KEY);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $data = array('image' => base64_encode(file_get_contents("weather.jpg")));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            return 'Error:' . curl_error($ch);
        }else{
            $response = json_decode($result, true);

            return $response['data']['url'];
        }
    }

    /**
     * Publish Image on Instagram Acc wettersolms
     * @return void
     */
    public function publishWeather(): void
    {
        // Upload IMG to imgbb public Server
        $imgURL = $this->uploadImgToServer();

        echo $imgURL;

        // Current date at post
        $date = date("Y.m.d");

        $userID = $_ENV['INSTAGRAM_API_KEY'];

        // Post url für Container
        $url = "https://graph.facebook.com/v14.0/$userID/media?image_url=$imgURL&caption=Wetter in Solms vom $date";
    }

}