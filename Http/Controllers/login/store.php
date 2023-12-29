<?php

use Core\App;
use Core\Hash;
use Core\Database;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if (! $form->validate($email, $password) ) {
    return view('login/create', [
        'errors' => $form->errors()
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
