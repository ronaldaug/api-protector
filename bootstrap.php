<?php

define('APIPROTECTOR', true);
session_start();
include("Limiter.php");
include("config.php");


/**
 * API protector addon
 */
if (COCKPIT_API_REQUEST) {

    /** ----------------------------------------------------------------------------------------------------
     *  Rate limit incoming requests
     * ----------------------------------------------------------------------------------------------------- */
    $app->on('collections.find.before', function ($name, &$entries) use ($app, $config) {
     
        // in this sample, we are using the originating IP, but you can modify to use API keys, or tokens or what-have-you.
        $rateLimiter = new RateLimiter($_SERVER["REMOTE_ADDR"]);

        try {
            $rateLimiter->limitRequestsInMinutes($config['limit'], $config['minutes']);
        } catch (RateExceededException $e) {
            header("HTTP/1.1 429 Too Many Requests");
            header(sprintf("Retry-After: %d", $config['seconds']));
            $data = ['status' => 427, 'message' => 'Too many requests!'];
            die(json_encode($data));
        }
    });



    /** ----------------------------------------------------------------------------------------------------
     *  Protect scraping the whole API data when calling `api/collections/entries/[collection_name]`
     * ----------------------------------------------------------------------------------------------------- */
    $app->on('collections.find.after', function ($name, &$entries) use ($app) {

        // Limit 10 entries
        $entries = array_slice($entries, 0, 10);
    });
}
