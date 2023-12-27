<?php



$config = require('config.php');

$db = new Database($config['database']);

$id = 1;

$query = "select * from posts where user_id = :id";

$posts = $db->query($query, [':id' => $id])->fetchAll();

$count = count($posts);

$heading = "My Posts ($count)";

require "views/posts.view.php";
