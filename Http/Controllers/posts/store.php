<?php

use Core\App;
use Core\Session;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);
$errors = [];


if (! Validator::string($_POST['title'], 1, 100)) {
    $errors['title'] = 'A title of not more than 100 characters is required!';
}

if (! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of not more than 1000 characters is required!';
}

if (empty($errors)) {

    $query = 'INSERT INTO `posts` (`title`, `body`, `user_id`) VALUES (:title, :body, :user_id) ';

    $db->query($query, [
        ':title' => $_POST['title'],
        ':body' => $_POST['body'],
        ':user_id' => auth('id'),
    ])->get();

    Session::flash('success', 'Post created successfully!');

    redirect_to('/posts');

}

Session::flash('errors', $errors);
Session::flash('old', [
    'title' => $_POST['title'],
    'body' => $_POST['body'],
]);

redirect_to('/posts/create');