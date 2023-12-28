<?php

$heading = "Post";

$config = require('config.php');

$id = $_GET["id"];

$currentUserId = 1;

$db = new Database($config['database']);

$query = "select * from posts where id = :id";

$post = $db->query($query, [':id' => $id])->findorFail();

authorize($post["user_id"] === $currentUserId);


require "views/posts/show.view.php";
