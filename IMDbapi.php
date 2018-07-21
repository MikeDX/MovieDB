<?php
    include('app.php');

    class IMDbapi extends MovieAPI {
    public $result = array('status'=>'false','message'=>'Unknown error');
    private $api_key = '';
    private $url = 'http://imdbapi.net/api';

    public function __construct($api = false)
    {
        $this->api_key = $api;
    }

    public function get($id = false,$type = 'json')
    {
        $param = [
            'key'  => $this->api_key,
            'id'   => $id,
            'type' => $type
        ];
        return $this->_fetch($param);
    }

    public function title($title = false,$type = 'json')
    {
        $param = [
            'key'   => $this->api_key,
            'title' => $title,
            'type'  => $type
        ];
        return $this->_fetch($param);
    }

    public function search($keyword = '', $id = '', $year = '',$page = 0,$type = 'json')
    {
        $param = [
            'key'   => $this->api_key,
            'title' => $keyword,
            'id'    => $id,
            'year'  => $year,
            'page'  => $page,
            'type'  => $type
        ];
        return $this->_fetch($param);
    }

    private function _fetch($param) {
        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, count($param));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER , true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST  , 2);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}