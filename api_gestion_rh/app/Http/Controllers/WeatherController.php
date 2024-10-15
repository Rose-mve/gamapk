<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function show(Request $request)
    {
        $city = $request->input('city', 'Libreville'); // Ville par défaut
        $weather = $this->weatherService->getWeather($city);
        
        return view('welcome', compact('weather'));
    }
}