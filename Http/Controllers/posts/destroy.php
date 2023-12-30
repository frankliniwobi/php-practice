<?php

use Core\App;
use Core\Session;
use Core\Database;

$db = App::resolve(Database::class);

$id = $_GET["id"];

$query = "select * from posts where id = :id";

$post = $db->query($query, [':id' => $id])->findorFail();

authorize($post["user_id"] === auth('id'));

$db->query("delete from posts where id = :id", [
    ':id' => $_POST['id']
]);

Session::flash('success', 'Post deleted');

redirect_to('/posts');