<?php

use Core\App;
use Core\Auth;
use Core\Hash;
use Core\Session;
use Core\Database;
use Core\Validator;

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

//validate input
if (! Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address';
}

if (! Validator::string($password, 7, 255)) {
    $errors['password'] = 'A password of not less and 7 and not greater than 255 characters is required';
}

if (! Validator::string($name, 5, 255)) {
    $errors['name'] = 'A name of not less and 5 and not more than 255 characters is required';
}

if (! empty($errors)) {
    Session::flash('errors', $errors);
    Session::flash('old', [
        'name' => $name,
        'email' => $email,
    ]);

    return redirect_to('/register');

}

//check if the email exists
$db = App::resolve(Database::class);

$check = $db->query('select * from users where email = :email', [
    ':email' => $email
])->find();

if ($check) {
    $errors['email'] = 'Sorry, this email address is already taken!';

    Session::flash('errors', $errors);
    Session::flash('old', [
        'name' => $name,
        'email' => $email,
    ]);

    return redirect_to('/register');
}

//create a new user
$user = $db->query("INSERT INTO `USERS` (`name`, `email`, `password`) VALUES (:name, :email, :password) ", [
    ':name' => $name,
    ':email' => $email,
    ':password' => Hash::make($password)
]);

if (! $user) {
    dd('error registering user!');
}

$user = [
    'name' => $name,
    'email' => $email
];

Auth::login($user);

redirect_to('/');