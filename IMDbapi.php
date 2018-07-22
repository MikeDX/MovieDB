<?php
/**
 * PHP Version 5
 * IMDbapi Class Interface
 *
 * @category IMDbapi
 * @package  MovieDBSearch
 * @author   Mike Green <mikedx@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://github.com/MikeDX
 */

require_once 'app.php';

/**
 * IMDbapi Class
 * Extends MovieAPI to talk to the IMDB api endpoint
 *
 * @category Class
 * @package  IMDbapi
 * @author   Mike Green <mikedx@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://github.com/MikeDX
 */

class IMDbapi extends MovieAPI
{
    public $result = array('status'=>'false','message'=>'Unknown error');
    public $url = 'http://imdbapi.net/api';

    /**
     * Retrieve Information about a movie based on ID
     * 
     * @param ID $id IMDB ID to fetch data for
     *
     * @return json
     */
    public function get($id = false)
    {
        $params = [
            'id'   => $id,
            'type' => 'json'
        ];
        return $this->_fetch($params);

    }
    
    /**
     * Retrieve Information about a movie based on Title
     * 
     * @param Title $title Title to get info for
     *
     * @return json
     */
    public function title($title = false)
    {
        $params = [
            'title' => $title,
            'type'  => 'json'
        ];
        return $this->_fetch($params);
    }

    /**
     * Search for a Movie
     * 
     * @param Keyword $keyword search criteria
     *
     * @return json
     */
    public function search($keyword = '')
    {
        $params = [
            'title' => $keyword,
            'id'    => $id,
            'year'  => $year,
            'page'  => 0,
            'type'  => 'json'
        ];
        return($this->_fetch($params));
    }

    /**
     * Fetch information from API endpoint
     * 
     * @param Parameters $params Parameters to send to api
     *
     * @return json
     */
    private function _fetch($params)
    {
        $params ['key'] = $this->api_key;
        $data = $this->fetchpost($params);
        // Convert result to our standard result array
        $result = $data;

        //        print_r($data);
        switch($this->method) {
        case "search":
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
        case "get":
            $result = [
                "title" => $data->title,
                "year" => $data->year,
                "image" => $data->poster,
                "imdbID" => $data->imdb_id,
                "plot" => $data->plot,
                "provider" => "imdb"
            ];
            break;

        }

        return json_encode($result);
    }

}