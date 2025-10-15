<?php
// functions.php

use GuzzleHttp\Client;

/**
 * Fetches a random cat fact from the Cat Facts API.
 * Returns a fallback message if the API fails.
 */
function getCatFact($url, $timeout = 5) {
    $client = new Client(['timeout' => $timeout]);
    try {
        $response = $client->get($url);
        $data = json_decode($response->getBody(), true);
        return $data['fact'] ?? "No cat fact found.";
    } catch (Exception $e) {
        return "Could not fetch cat fact at the moment.";
    }
}

/**
 * Returns the current UTC time in ISO 8601 format.
 */
function getCurrentUTCTime() {
    return gmdate("Y-m-d\TH:i:s.v\Z");
}
