<?php
/**
 * PHP Version 5
 * MovieAPI Class File
 *
 * @category MoveAPI
 * @package  MovieDBSearch
 * @author   Mike Green <mikedx@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://github.com/MikeDX
 */


/**
 * PHP Version 5
 * MovieAPI Class 
 *
 * @category Class
 * @package  MovieDBSearch
 * @author   Mike Green <mikedx@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://github.com/MikeDX
 */
class MovieAPI
{

    protected $api_key = '';

    /**
     * Initalise class
     * 
     * @param apikey $api API Key to use
     *
     * @return void
     */
    public function __construct($api = '')
    {
        if ($api == '') {
            echo("Api is not configured");
            die();
        }
        $this->api_key = $api;
    }

    /**
     * Fetch information from API endpoint via POST request
     * 
     * @param Parameters $params Parameters to send to api
     *
     * @return Object from json response
     */
    public function fetchpost($params)
    {

        $this->_getcall();
        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, count($params));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result);
    }

    /**
     * Fetch information from API endpoint via GET request
     * 
     * @param Parameters $params Parameters to send to api
     *
     * @return Object from json response
     */
    public function fetchget($params)
    {

        $this->_getcall();
        // construct URL for get requests
        $data = '';

        foreach ($params as $key=>$value) {
            $data .= $key.'='.$value.'&';
        }         

        $data = trim($data, '&');

        $url = "{$this->url}?{$data}";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        $result = curl_exec($ch);
        curl_close($ch);

        if (!$result) {
            $this->error = json_encode(['No results']);
        }
        return json_decode($result);
    }

    /**
     * Set method based upon calling function
     * 
     * @return void
     */
    private function _getcall()
    {
        // get the called method, for formatting results
        $trace = debug_backtrace();
        $caller = $trace[3];

        $this->method = $caller['function'];

    }

}