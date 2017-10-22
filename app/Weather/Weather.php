<?php
namespace App\Weather;

interface Weather{
	public function getWeather();
	public function getTemperature();
}