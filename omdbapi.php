<?php
include('app.php');

Class OMDBAPI extends MovieAPI {
	
	public $url = "http://www.omdbapi.com/";

	public function search($keyword='')
	{
		$params = [
			"s" => $keyword
		];

		return $this->_fetchget($params);
	}

}