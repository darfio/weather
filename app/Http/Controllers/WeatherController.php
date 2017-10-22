<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Weather\YahooWeatherServiceProvider;
use App\Weather\WeatherService;

class WeatherController extends Controller
{
    public function index(){

    	$yahooWeather = new YahooWeatherServiceProvider();
		$weather_service = new WeatherService($yahooWeather);
		$temperature = $weather_service->getTemperature();

    	return view('weather', ['temperature'=>$temperature]);
    }
}
