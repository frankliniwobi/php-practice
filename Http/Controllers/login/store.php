<?php

use Core\Auth;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if ($form->validate($email, $password)) {
    if ((new Auth)->attempt($email, $password)) {
        redirect_to('/');
    }

    $form->error('email', 'No matching account found for that email address and password.');
}

return view('login/create', [
    'errors' => $form->errors()
]);
