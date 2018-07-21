<?php
include('app.php');

Class OMDBAPI extends MovieAPI {
	
	public $url = "http://www.omdbapi.com/";

	public function search($keyword='')
	{
		$params = [
			"s" => $keyword
		];

		return $this->_fetch($params);
	}

	private function _fetch($params) {
		$params['apikey'] = $this->api_key;
		return $this->fetchget($params);
	}

}