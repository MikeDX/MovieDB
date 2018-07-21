<?php
// runtests
include('app.php');
	echo "\nTesting IMDB API\n";
	$imdb = new IMDbapi($config['imdbapi_key']);
	$data = $imdb->search('batman','',99);
	print_r($data);

	echo "\nTesting OMDB API\n";
	$omdb = new OMDbapi($config['omdbapi_key']);
	$data = $omdb->search('batman');
	print_r($data);

	echo "\nTesting TMDB API\n"