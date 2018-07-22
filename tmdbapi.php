<?php
include_once('app.php');

Class TMDbapi extends MovieAPI {
	
	public $base_url = "https://api.themoviedb.org/3/";
	public $url = "";

	public function search($keyword='')
	{
		$this->url = $this->base_url . "search/movie";
		$params = [
			"query" => $keyword
		];

        $result = $this->_fetch($params);
//		print_r($result);
        return($result);
	}

    public function get($id='')
    {
        $this->url = $this->base_url . "search/movie";
        $params = [
            "query" => $keyword
        ];

        $result = $this->_fetch($params);

    }


	private function _fetch($params) {
		$params['api_key'] = $this->api_key;
        $data = $this->fetchget($params);
        // Convert result to our standard result array
//        print_r($data);
        $result=["result" => []];

        switch($this->method) {
            case "search":
//                echo "Formatting search results";
                // Currently search only returns one result
                foreach($data->results as $movie)
                $result["results"][] = [
                    "title" => $movie->title,
                    "year" => date("Y",strtotime($movie->release_date)),
                    "image" => "https://image.tmdb.org/t/p/w500".$movie->backdrop_path,
                    "imdbID" => $movie->id,
                    "provider" => "tmdb"
                ];

                break;

        }

        return json_encode($result);
	}
}