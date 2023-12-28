<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$id = $_GET["id"];

$currentUserId = 1;

$query = "select * from posts where id = :id";

$post = $db->query($query, [':id' => $id])->findorFail();

authorize($post["user_id"] === $currentUserId);

return view('posts/show', [
    'heading' => 'Post',
    'post' => $post
]);
