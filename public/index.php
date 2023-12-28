<?php

const BASE_PATH = __DIR__ . "/../";

require BASE_PATH . 'Core/functions.php';

/**
 * To avoid requiring every class we may need
 * later on, let's allow php to autoload
 * the classes automatically.
 */
spl_autoload_register(function($class) {
    require base_path('Core/' . $class . '.php') ;
});

require base_path('Core/router.php');
