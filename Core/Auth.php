<?php

namespace Core;

use Core\App;
use Core\Hash;
use Core\Session;
use Core\Database;

class Auth
{
    public function attempt($email, $password)
    {
        $user = App::resolve(Database::class)
            ->query('select * from users where email = :email', [
            'email' => $email
        ])->find();

        if ($user) {
            if (Hash::check($password, $user['password'])) {
                $this->login([
                    'email' => $email,
                    'name' => $user['name']
                ]);

                return true;
            }
        }

        return false;
    }

    public function login($user)
    {
        Session::put('user', [
            'email' => $user['email'],
            'name' => $user['name'],
        ]);

        session_regenerate_id(true);
    }

    public static function logout()
    {
        Session::destroy();
    }
}