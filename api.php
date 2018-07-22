<?php
require_once 'app.php';

// Handle get requests

switch($_GET['req']) {
case "providers":
    $providers = ['imdb' => 'IMDB','omdb' => 'OMDB','tmdb' => 'TMDB'];
    $results = [];
    foreach ($providers as $provider => $name) {
        $results[]=['provider' => $provider, 'name' => $name];
    }
    print_r(json_encode($results));
    break;

case "search":
    $api = getAPI($_GET['provider'], $config);
    $data = $api->search(urlencode($_GET['q']));
    echo $data;
    break;
}