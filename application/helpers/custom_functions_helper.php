<?php
defined('BASEPATH') OR exit('No direct script access allowed');


if ( ! function_exists( 'get_open_weather' ) ) {
	
	function get_open_weather($city_name="Tokyo") {
		
		$apikey				= "YOUR_API_KEY";
        $country_code 		= "JP";
		$curlurl			= "api.openweathermap.org/data/2.5/weather?q={$city_name},{$country_code}&appid={$apikey}";
		
        $ch = curl_init($curlurl);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $country_code);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
		
		return $result;
	}
	
}

if ( ! function_exists( 'get_foursquare_venue' ) ) {
	
	function get_foursquare_venue($city_name="Tokyo") {
		
		$city_name			= ucwords($city_name);
		$fs_client_id			= "YOUR_CLIENT_ID";
		$fs_client_secret		= "YOUR_CLIENT_SECRET";
		$curlurl 			= "https://api.foursquare.com/v2/venues/explore?near={$city_name},JP&client_id={$fs_client_id}&client_secret={$fs_client_secret}&v=20180323&limit=1&ll=40.7243,-74.0018&query=Tourist+Attractions";
		 /* Init cURL resource */
        $ch = curl_init($curlurl);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
		
		return json_decode($result);
	}
	
}

if ( ! function_exists( 'get_foursquare_commute' ) ) {
	
	function get_foursquare_commute($city_name="Tokyo") {
		
		$city_name			= ucwords($city_name);
		$fs_client_id		= "XDSMJ1CQSYYA4LBVK4SNGE0UU0EU5I2IEXDR2TTO4T12DDOI";
		$fs_client_secret	= "4N5DWC1FUDL0KQ5WLYCR4SZZKEIS4NZCPNYYMMOY0EM4J2O4";
		$curlurl 			= "https://api.foursquare.com/v2/venues/explore?near={$city_name},JP&client_id={$fs_client_id}&client_secret={$fs_client_secret}&v=20180323&limit=1&ll=40.7243,-74.0018&query=Rules";
		
        $ch 				= curl_init($curlurl);
		
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
		
		return json_decode($result);
		
	}
	
}
