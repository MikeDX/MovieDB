<?php
include('app.php');

// Handle get requests

switch($_GET['req']) {
	case "providers":
		$providers = ['imdb' => 'IMDB','omdb' => 'OMDB','tmdb' => 'TMDB'];
//		print_r($providers);
		$results = [];
		foreach($providers as $provider => $name) {
			$results[]=['provider' => $provider, 'name' => $name];
		}
		print_r(json_encode($results));
		break;

	case "search":
		switch($_GET['provider']) {
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
		$data = $api->search(urlencode($_GET['q']));
		echo $data;
		break;
}