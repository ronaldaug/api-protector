<?php
if (! defined('APIPROTECTOR')) {
    exit('No direct script access allowed');
}

$config = [
    "limit"     => 100,			//	number of connections to limit user to per $minutes
    "minutes"   => 1,			//	number of $minutes to check for.
    "seconds"   => floor($minutes * 60),	//	retry after $minutes in seconds.
    "show_only" => 10          // Protect scraping collection data, show only 10 entries per call
];
