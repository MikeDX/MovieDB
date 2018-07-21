<?php
	include('app.inc');
	include('IMDbapi.php');
	$imdb = new IMDbapi($config['api_key']);
	// $data = $imdb->get('tt0004614','json');
	// print_r($data);

	$data = $imdb->search('batman','',99);
	print_r($data);