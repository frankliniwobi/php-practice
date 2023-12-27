<?php

$heading = "Post";

$config = require('config.php');

$db = new Database($config['database']);

$id = $_GET["id"];

$query = "select * from posts where id = :id";

$post = $db->query($query, [':id' => $id])->fetch();

// dd($post);

require "views/post.view.php";
