<?php
/**
 * PHP Version 5
 * OMDbapi Class Interface
 *
 * @category OMDbapi
 * @package  MovieDBSearch
 * @author   Mike Green <mikedx@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://github.com/MikeDX
 */

require_once 'app.php';

/**
 * OMDbapi Class
 * Extends MovieAPI to talk to the OMDB api endpoint
 *
 * @category Class
 * @package  OMDbapi
 * @author   Mike Green <mikedx@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://github.com/MikeDX
 */
Class OMDbapi extends MovieAPI
{
    
    public $url = "http://www.omdbapi.com/";

    /**
     * Search for a Movie
     * 
     * @param Keyword $keyword search criteria
     *
     * @return json
     */
    public function search($keyword='')
    {
        $params = [
            "s" => $keyword
        ];

        return($this->_fetch($params));
    }

    /**
     * Retrieve Information about a movie based on ID
     * 
     * @param ID $id IMDB ID to fetch data for
     *
     * @return json
     */
    public function get($id = '')
    {
        $params = [
            "i" => $id
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
        $params['apikey'] = $this->api_key;
        $data = $this->fetchget($params);

        if (!$data) {
            print_r($this->error);
            die();
        }
        // Convert result to our standard result array

        switch($this->method) {

        case "search":
            //                echo "Formatting search results";
            // Currently search only returns one result
            $result=["result" => []];

            foreach ($data->Search as $movie) {
                $result["results"][] = [
                "title" => $movie->Title,
                "year" => $movie->Year,
                "image" => $movie->Poster,
                "imdbID" => $movie->imdbID,
                "provider" => "omdb"
                ];
            }

            break;

        case "get":
            $result = [
                "title" => $data->Title,
                "year" => $data->Year,
                "image" => $data->Poster,
                "imdbID" => $data->imdbID,
                "plot" => $data->Plot,
                "provider" => "omdb"
            ];
            break;

        }
        return json_encode($result);
    }

}