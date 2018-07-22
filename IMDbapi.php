<?php
include('app.php');

class IMDbapi extends MovieAPI {
    public $result = array('status'=>'false','message'=>'Unknown error');
    public $url = 'http://imdbapi.net/api';

    public function get($id = false, $type = 'json')
    {
        $param = [
            'id'   => $id,
            'type' => $type
        ];
        $result = $this->_fetch($param);
    }

    public function title($title = false, $type = 'json')
    {
        $param = [
            'title' => $title,
            'type'  => $type
        ];
        return $this->_fetch($param);
    }

    public function search($keyword = '', $id = '', $year = '', $page = 0, $type = 'json')
    {
        $param = [
            'title' => $keyword,
            'id'    => $id,
            'year'  => $year,
            'page'  => $page,
            'type'  => $type
        ];
        $result = $this->_fetch($param);
        print_r($result);
    }

    private function _fetch($param) {
        $param ['key'] = $this->api_key;
        $data = $this->fetchpost($param);
        // Convert result to our standard result array
        $result = $data;

//        print_r($data);
        switch($this->method) {
            case "search":
                // echo "Formatting search results";
                // Currently search only returns one result
                $result = [
                    "results" => [
                        [
                            "title" => $data->title,
                            "year" => $data->year,
                            "image" => $data->poster,
                            "imdbID" => $data->imdb_id,
                            "provider" => "imdb"
                        ]
                    ]
                ];

                break;
        }

        return json_encode($result);
    }

}