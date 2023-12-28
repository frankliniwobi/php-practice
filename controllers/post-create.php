<?php

$heading = 'Create Post';

$config = require('config.php');
$db = new Database($config['database']);

if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {

    $errors = [];

    if (strlen($_POST['title']) > 100 ) {
        $errors['title'] = 'The title cannot be more than 100 characters';
    }

    if (strlen($_POST['title']) === 0 ) {
        $errors['title'] = 'The title is required';
    }

    if (strlen($_POST['body']) === 0) {
        $errors['body'] = 'The body is required';
    }

    if (strlen($_POST['body']) > 1000) {
        $errors['body'] = 'The body cannot be more than 1000 characters';
    }

    if (empty($errors)) {

        $id = 1;

        $query = 'INSERT INTO `posts` (`title`, `body`, `user_id`) VALUES (:title, :body, :user_id) ';

        $posts = $db->query($query, [
            ':title' => $_POST['title'],
            ':body' => $_POST['body'],
            ':user_id' => $id,
        ])->get();

        header("Location: /posts/create?success=Post+created+successfully!");
        exit;

    }

}

require 'views/post-create.view.php';
