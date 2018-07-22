<?php
/**
    Run Tests
 **/

require_once 'app.php';

$providers = ['imdb','omdb','tmdb'];

foreach ($providers as $provider) {
    $api = getAPI($provider, $config);
    echo "Testing {$provider} API\n";
    $data = $api->search('batman');
}

echo "Done\n";