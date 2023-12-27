<?php

$heading = "Create Post";

$config = require('config.php');

if ($_SERVER["REQUEST_METHOD"] === "POST" ) {

    $db = new Database($config['database']);

    $id = 1;

    $query = "INSERT INTO `posts` (`title`, `body`, `user_id`) VALUES (:title, :body, :user_id) ";

    $posts = $db->query($query, [
        ':title' => $_POST['title'],
        ':body' => $_POST['body'],
        ':user_id' => $id,
    ])->get();

}

require "views/post-create.view.php";
