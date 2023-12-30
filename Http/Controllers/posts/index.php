<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$query = "select * from posts where user_id = :id";

$posts = $db->query($query, [':id' => auth('id')])->get();

$count = count($posts);

$heading = "My Posts ($count)";

return view('posts/index', [
    'heading' => $heading,
    'posts' => $posts
]);