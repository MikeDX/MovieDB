<?php

class MovieAPI {

	protected $api_key = '';

    public function __construct($api = '')
    {
    	if($api == '') {
            print_r(debug_backtrace());
    		echo("Api is not configured");
    		die();
    	}
        $this->api_key = $api;
    }

    public function fetchpost($param) {

        $this->_getcall();
        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, count($param));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER , true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST  , 2);
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result);
    }
	public function fetchget($params) {

        $this->_getcall();
		// construct URL for get requests
		$data = '';

	    foreach($params as $key=>$value)
        	$data .= $key.'='.$value.'&';         

        $data = trim($data, '&');

        $url = "{$this->url}?{$data}";

//        print_r($url);

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER , true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST  , 2);
		$result = curl_exec($ch);
		curl_close($ch);

        if(!$result) {
            $this->error = json_encode(['No results']);
        }
		return json_decode($result);
	}

    private function _getcall() {
        // get the called method, for formatting results
        $trace = debug_backtrace();
        $caller = $trace[3];

        $this->method = $caller['function'];

    }

}