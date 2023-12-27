<?php

$heading = "My Posts";

$config = require('config.php');

$db = new Database($config['database']);

$id = 1;

$query = "select * from posts where user_id = :id";

$posts = $db->query($query, [':id' => $id])->fetchAll();

// dd($post);

require "views/posts.view.php";
