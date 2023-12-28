<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);
$errors = [];

return view('posts/create', [
    'heading' => 'Create Post',
    'errors' => $errors
]);
