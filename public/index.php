<?php

use Core\Router;

session_start();

// dd(sys_get_temp_dir()); //get local session storage directory

const BASE_PATH = __DIR__ . "/../";

require BASE_PATH . 'Core/functions.php';

/**
 * To avoid requiring every class we may need
 * later on, let's allow php to autoload
 * the classes automatically.
 */
spl_autoload_register(function($class) {

    //replace backslash(\) with the directory separator
    //for your OS
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require base_path("{$class}.php");
});

require base_path('bootstrap.php');

//instantiate the router class
$router = new Router();

$routes = require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);
