<?php

$routes = require('routes.php');

function routeToController($url, $routes) {
    //require the controller if array includes key
    if (array_key_exists($url, $routes)) {
        require $routes[$url];
    } else {
        abort();

    }
}

function abort($code = 404) {
    http_response_code($code);

    require "views/{$code}.php";

    die();
}

//get the current page URL and strip the query strings
$url = parse_url($_SERVER["REQUEST_URI"])['path'];

routeToController($url, $routes);
