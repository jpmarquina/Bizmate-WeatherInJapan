<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends MY_Ajax {

	function __construct () {
		parent::__construct ();
		$this->currView = "ajax";
	}
	
	public function index () {
		self::requests();
	}
	
	function requests ($function="", $formname="", $post="") {
		
		if ( $this->input->is_ajax_request () ) {
			
			$return	= "";
			$post 	= new STDClass;
			if ($this->input->post()) {
				foreach ($this->input->post() as $key => $val) {
					$post->$key = $val;
				}
			}
			if ($function==="fetch") {
				$return = self::__fetch($formname, $post);
			}
			
			else {
				die("undefined");
			}
			
			print json_encode ( $return );
				
				
		} else {
			
			exit("no direct access allowed!");
		}
		
	}
	
	private function __fetch($formname, $post) {
		
		if ($formname=="weather") {
			return self::__fetch_weather($post);
		}
		return false;
		
	}
	
	private function __fetch_weather($post) {
		
		if (! empty($post->city_name)) {
			$city_name		= $post->city_name;
		}
		
		$result				= get_open_weather($city_name);
		
		$ajax				= array (
								"ajaxpage" 		=> "fetch-weather",
								"result"		=> json_decode($result),
							);
		$contents			= parent::drawajax ( $ajax );		
		
		$data				= array (
								"contents"		=> $contents
							);
		
		return $data;
		
	}
	
}