<?php
include('app.php');

Class TMDBAPI extends MovieAPI {
	
	public $base_url = "https://api.themoviedb.org/3/";
	public $url = "";

	public function search($keyword='')
	{
		$this->url = $this->base_url . "search/movie";
		$params = [
			"query" => $keyword
		];

		return $this->_fetch($params);
	}

	private function _fetch($params){
		$params['api_key'] = $this->api_key;
		return $this->fetchget($params);
	}
}