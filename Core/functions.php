<?php

use Core\Response;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value) {
    return parse_url($_SERVER["REQUEST_URI"])['path'] === $value;
}

function authorize($condition, $status = Response::FORBIDDEN) {
    if (! $condition) {
        abort($status);
    }
}

function base_path($path) {
    return BASE_PATH . $path;
}

function view($path, $attributes = []) {

    //extract the variables parsed
    //and provide it to the view
    extract($attributes);

    require BASE_PATH . "views/{$path}.view.php";
}

function abort($code = 404)
{
    http_response_code($code);

    require base_path("views/error_pages/{$code}.php");

    die();
}

function login(array $user) {
    $_SESSION['user'] = [
        'name' => $user['name'],
        'email' => $user['email']
    ];
}
