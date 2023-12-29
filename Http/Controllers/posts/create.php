<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$errors = [];

return view('posts/create', [
    'heading' => 'Create Post',
    'errors' => $errors
]);
