<?php

$config = require base_path('config.php');

$db = new Database($config['database']);

$id = 1;

$query = "select * from posts where user_id = :id";

$posts = $db->query($query, [':id' => $id])->get();

$count = count($posts);

$heading = "My Posts ($count)";

return view('posts/index', [
    'heading' => $heading,
    'posts' => $posts
]);
