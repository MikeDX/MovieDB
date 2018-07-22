<?php
	date_default_timezone_set('Europe/London');
	(@include_once("app.inc")) OR die("Please copy app.inc.default to app.inc and configure your API keys\n");
	require_once("movieapi.php");
	require_once("IMDBapi.php");
	require_once("omdbapi.php");
	require_once("tmdbapi.php");

function getAPI($provider, $config) {
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