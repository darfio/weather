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
		$temperature_farenheito = $weather_service->getTemperature();
		$temperature_celsius = $this->farenheito_to_celsius($temperature_farenheito);

		$data = [
			'temperature_farenheito' => $temperature_farenheito,
			'temperature_celsius' => $temperature_celsius,
		];
    	return view('weather', $data);
    }

    private function farenheito_to_celsius($farenheito){
		$celsius = ($farenheito - 32) * 5 / 9;
		return round($celsius);
	}
}
