<?php
include('app.php');

Class TMDBAPI extends MovieAPI {
	
	public $base_url = "https://api.themoviedb.org/3/";
	public $url = "";

	public function search($keyword='')
	{
		$this->url = $this->base_url . "search/movie";
		$params = [
			"s" => $keyword
		];

		return $this->_fetchget($params);
	}

}