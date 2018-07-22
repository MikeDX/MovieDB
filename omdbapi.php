<?php
include('app.php');

Class OMDbapi extends MovieAPI {
	
	public $url = "http://www.omdbapi.com/";

	public function search($keyword='')
	{
		$params = [
			"s" => $keyword
		];

		$result = $this->_fetch($params);
		return($result);
//		print_r($result);
	}

	public function get($id = '')
	{

	}

	private function _fetch($params) {
		$params['apikey'] = $this->api_key;
        $data = $this->fetchget($params);

        if(!$data) {
        	print_r($this->error);
        	die();
        }
        // Convert result to our standard result array

//        print_r($data);
        $result=["result" => []];
        switch($this->method) {
            case "search":
//                echo "Formatting search results";
                // Currently search only returns one result
                foreach($data->Search as $movie)
                $result["results"][] = [
                    "title" => $movie->Title,
                    "year" => $movie->Year,
                    "image" => $movie->Poster,
                    "imdbID" => $movie->imdbID,
                    "provider" => "omdb"
                ];

                break;

        }
        return json_encode($result);
	}

}