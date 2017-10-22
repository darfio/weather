<?php
namespace App\Weather;

class YahooWeatherServiceProvider implements Weather{
	
	protected $weather;

	public function __construct(){
		//
	}

	public function getWeather(){
	    $BASE_URL = "http://query.yahooapis.com/v1/public/yql";
		$yql_query = '
			select item.condition from weather.forecast where woeid in (select woeid from geo.places(1) where text="vilnius, lt")
		';
		
	    $yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&format=json";
		
	    // Make call with cURL
	    $session = curl_init($yql_query_url);
	    curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
	    $response_json = curl_exec($session);
		
	    // Convert JSON to PHP object
	    $response_obj =  json_decode($response_json);
		 
		$this->weather = $response_obj;
	}

	//
	public function getTemperature(){
		return $this->weather->query->results->channel->item->condition->temp; 	
	}	

}