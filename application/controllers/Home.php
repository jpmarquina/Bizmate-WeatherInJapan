<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	function __construct () {
		parent::__construct();
	}
	
	public function index() {
		
		$elements			= get_foursquare_venue();
		
		$params				= array (
								"from"	=> "tbl_pages",
								"where"	=> array (
											"page_view"	=> "tokyo"
										),
								"row"	=> true
							);
		$page				= $this->Main_model->quick_query ($params);
		
		
		$attractions		= false;
		$galleries			= false;
		
		if ( !empty($page)) {
			
			$params			= array (
								"from"	=> "tbl_attractions",
								"where"	=> array (
											"pid"	=> $page->pid
										),
								"row"	=> true
							);
			$attractions	= $this->Main_model->quick_query ($params);
			
			if (! empty($attractions)) {
				$params		= array (
									"from"	=> "tbl_attraction_gallery",
									"where"	=> array (
												"aid"	=> $attractions->aid
											)
								);
				$galleries	= $this->Main_model->quick_query ($params);
			}
			
		}
		
		$data 			= array (
							"view"			=> "home",
							"city_name"		=> "tokyo",
							"elements"		=> $elements,
							"page"			=> $page,
							"attractions"	=> $attractions,
							"galleries"		=> $galleries
						);
				
		parent::drawpage($data);
	}
	
	public function tour($city_name) {
		
		$elements			= get_foursquare_venue($city_name);

		$params				= array (
								"from"	=> "tbl_pages",
								"where"	=> array (
											"page_view"	=> $city_name
										),
								"row"	=> true
							);
		$page				= $this->Main_model->quick_query ($params);
		
		$attractions		= false;
		$galleries			= false;
		
		if (empty($page)) {
			redirect (base_url());
			exit;
		} else {
		
			$params			= array (
								"from"	=> "tbl_attractions",
								"where"	=> array (
											"pid"	=> $page->pid
										),
								"row"	=> true
							);
			$attractions	= $this->Main_model->quick_query ($params);

			if (! empty($attractions)) {
				$params		= array (
									"from"	=> "tbl_attraction_gallery",
									"where"	=> array (
												"aid"		=> $attractions->aid,
												"ag_status"	=> 1
											)
								);
				$galleries	= $this->Main_model->quick_query ($params);
			}
			
		}
		$data 		= array (
						"view"			=> "home",
						"city_name"		=> $city_name,
						"elements"		=> $elements,
						"page"			=> $page,
						"attractions"	=> $attractions,
						"galleries"		=> $galleries
					);
				
		parent::drawpage($data);
	}
	
}
