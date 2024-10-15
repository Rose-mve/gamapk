<?php

namespace App\Services;

use GuzzleHttp\Client;

class WeatherService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('WEATHER_API_KEY'); // Clé API depuis .env
    }

    public function getWeather($city)
    {
        $response = $this->client->get("http://api.openweathermap.org/data/2.5/weather", [
            'query' => [
                'q' => $city,
                'appid' => $this->apiKey,
                'units' => 'metric', // Température en Celsius
                'lang'=>'fr'
            ]

        ]);

        return json_decode($response->getBody(), true);
    }
}