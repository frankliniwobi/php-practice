<?php

use Core\App;
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

    $id = 1;

    $query = 'INSERT INTO `posts` (`title`, `body`, `user_id`) VALUES (:title, :body, :user_id) ';

    $db->query($query, [
        ':title' => $_POST['title'],
        ':body' => $_POST['body'],
        ':user_id' => $id,
    ])->get();

    redirect_to('/posts/create?success=Post+created+successfully!');

}

return view('posts/create', [
    'heading' => 'Create Post',
    'errors' => $errors
]);