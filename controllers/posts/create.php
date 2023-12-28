<?php

use Core\Database;
use Core\Validator;

$config = require base_path('config.php');
$db = new Database($config['database']);
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {

    if (! Validator::string($_POST['title'], 1, 100)) {
        $errors['title'] = 'A title of not more than 100 characters is required!';
    }

    if (! Validator::string($_POST['body'], 1, 1000)) {
        $errors['body'] = 'A body of not more than 1000 characters is required!';
    }

    if (empty($errors)) {

        $id = 1;

        $query = 'INSERT INTO `posts` (`title`, `body`, `user_id`) VALUES (:title, :body, :user_id) ';

        $db->query($query, [
            ':title' => $_POST['title'],
            ':body' => $_POST['body'],
            ':user_id' => $id,
        ])->get();

        header("Location: /posts/create?success=Post+created+successfully!");
        exit;

    }

}

return view('posts/create', [
    'heading' => 'Create Post',
    'errors' => $errors
]);
