<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$id = 1;

$query = "select * from posts where user_id = :id";

$posts = $db->query($query, [':id' => $id])->get();

$count = count($posts);

$heading = "My Posts ($count)";

return view('posts/index', [
    'heading' => $heading,
    'posts' => $posts
]);
