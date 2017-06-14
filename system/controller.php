<?php 
namespace System;

class Controller extends System {

	public function __construct(){
		parent::__construct();
		date_default_timezone_set('America/Sao_Paulo');
	}

	protected function view( $name, $data = null ){
		if( is_array($data) && count($data) > 0 ){
			extract($data);
		}
		require_once APPPATH . DIRECTORY_SEPARATOR . "View" . DIRECTORY_SEPARATOR . $name . '.php';
	}

	protected function site_url( $page = '' ){			
		return BASE_URL . $page;
	}
}

