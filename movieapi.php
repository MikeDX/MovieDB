<?php

class MovieAPI {

	protected $api_key = '';

    public function __construct($api = '')
    {
    	if($api == '') {
    		echo("Api is not configured");
    		die();
    	}
        $this->api_key = $api;
    }

    public function _fetchpost($param) {
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
	public function _fetchget($params) {

		// construct URL for get requests
		$params['apikey'] = $this->api_key;
		$data = '';

	    foreach($params as $key=>$value)
        	$data .= $key.'='.$value.'&';         

        $data = trim($data, '&');

        $url = "{$this->url}?{$data}";

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER , true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST  , 2);
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}

}