<?php
/**
 * PHP Version 5
 * Shared App entrypoint
 *
 * @category MoveDBSearch_App
 * @package  MovieDBSearch
 * @author   Mike Green <mikedx@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://github.com/MikeDX
 */
    date_default_timezone_set('Europe/London');
    (@require_once "app.inc") OR
        die("Please copy app.inc.default to app.inc and configure your API keys\n");
    require_once "movieapi.php";
    require_once "IMDBapi.php";
    require_once "omdbapi.php";
    require_once "tmdbapi.php";

/**
 * Setup api handle for different endpoints
 * 
 * @param Provider $provider one of imdb, omdb or tmdb
 * @param Config   $config   Configuration array taken from app.inc
 *
 * @return MovieAPI Class object
 */
function getAPI($provider, $config)
{
    switch($provider) {
    case 'imdb':
        $api = new IMDbapi($config['imdbapi_key']);
        break;
    case 'omdb':
        $api = new OMDbapi($config['omdbapi_key']);
        break;
    case 'tmdb':
        $api = new TMDbapi($config['tmdbapi_key']);
        break;
    default:
        die();
    }

    return $api;

}