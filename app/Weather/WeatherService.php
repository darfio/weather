<?php
namespace App\Weather;

class WeatherService{
	
	protected $service_provider;

	public function __construct(Weather $provider){
		$this->service_provider = $provider;
		$this->service_provider->getWeather();
	}

	public function getTemperature(){
		return $this->service_provider->getTemperature();;
	}	
			
}