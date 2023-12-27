<?php

$heading = "Post";

$config = require('config.php');

$id = $_GET["id"];

$currenUserId = 1;

$db = new Database($config['database']);

$query = "select * from posts where id = :id";

$post = $db->query($query, [':id' => $id])->fetch();

if (! $post) {
    abort();
}

if ($post["user_id"] !== $currenUserId) {
    abort(Response::FORBIDDEN);
}


require "views/post.view.php";
