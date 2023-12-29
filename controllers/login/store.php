<?php

use Core\App;
use Core\Hash;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

//validate input
if (! Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address';
}

if (! Validator::string($password)) {
    $errors['password'] = 'Please provide a password';
}

if (! empty($errors)) {
    return view('login/create', [
        'errors' => $errors
    ]);
}

//check if the email exists
$db = App::resolve(Database::class);

$user = $db->query('select * from users where email = :email', [
    ':email' => $email
])->find();

if (! $user) {
    $errors['email'] = 'account not found!';
    return view('login/create', [
        'errors' => $errors
    ]);
}

if (! Hash::check($password, $user['password'])) {
    $errors['password'] = 'Incorrect credentials!';
    return view('login/create', [
        'errors' => $errors
    ]);
}

login($user);

redirect_to('/');
