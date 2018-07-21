<?php
include('app.php');

// Handle get requests

switch($_GET['req']) {
	case "providers":
		break;
	case "search":
		$omdb = new OMDbapi($config['omdbapi_key']);
		$data = $omdb->search('batman');
		echo $data;
		break;
}