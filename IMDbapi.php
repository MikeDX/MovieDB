<?php
include('app.php');

class IMDbapi extends MovieAPI {
    public $result = array('status'=>'false','message'=>'Unknown error');
    public $url = 'http://imdbapi.net/api';

    public function get($id = false,$type = 'json')
    {
        $param = [
            'key'  => $this->api_key,
            'id'   => $id,
            'type' => $type
        ];
        return $this->_fetchpost($param);
    }

    public function title($title = false,$type = 'json')
    {
        $param = [
            'key'   => $this->api_key,
            'title' => $title,
            'type'  => $type
        ];
        return $this->_fetchpost($param);
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
        return $this->_fetchpost($param);
    }

}