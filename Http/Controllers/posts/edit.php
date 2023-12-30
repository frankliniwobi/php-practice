<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$id = $_GET["id"];

$query = "select * from posts where id = :id";

$post = $db->query($query, [':id' => $id])->findorFail();

authorize($post["user_id"] === auth('id'));

$errors = [];

return view('posts/edit', [
    'heading' => 'Edit Post',
    'errors' => $errors,
    'post' => $post
]);