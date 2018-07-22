<?php
/**
 * PHP Version 5
 * TMDbapi Class File
 *
 * @category TMDBapi
 * @package  MovieDBSearch
 * @author   Mike Green <mikedx@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://github.com/MikeDX
 */

require_once 'app.php';

/**
 * TMDbapi Class
 * Extends MovieAPI to talk to the TMDB api endpoint
 *
 * @category Class
 * @package  TMDbapi
 * @author   Mike Green <mikedx@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://github.com/MikeDX
 */
Class TMDbapi extends MovieAPI
{
    
    public $base_url = "https://api.themoviedb.org/3/";
    public $url = "";

    /**
     * Search for a Movie
     * 
     * @param Keyword $keyword search criteria
     *
     * @return json
     */
    public function search($keyword='')
    {
        $this->url = $this->base_url . "search/movie";
        $params = [
        "query" => $keyword
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
    public function get($id='')
    {
        $this->url = $this->base_url . "movie/{$id}";
        return($this->_fetch());
    }

    /**
     * Fetch information from API endpoint
     * 
     * @param Parameters $params Parameters to send to api
     *
     * @return json
     */
    private function _fetch($params=[])
    {
        $params['api_key'] = $this->api_key;
        $data = $this->fetchget($params);
        // Convert result to our standard result array

        switch($this->method) {
        case "search":
            // Currently search only returns one result!
            $result=["result" => []];
            foreach ($data->results as $movie) {
                $result["results"][] = [
                "title" => $movie->title,
                "year" => date("Y", strtotime($movie->release_date)),
                "image" => "https://image.tmdb.org/t/p/w500".$movie->backdrop_path,
                "imdbID" => $movie->id,
                "provider" => "tmdb"
                ];
            }

            break;

        case "get":
            $result = [
                "title" => $data->title,
                "year" => date("Y", strtotime($data->release_date)),
                "image" => "https://image.tmdb.org/t/p/w500".$data->backdrop_path,
                "imdbID" => $data->id,
                "provider" => "tmdb",
                "plot" => $data->overview
            ];

            break;

        }

        return json_encode($result);
    }
}