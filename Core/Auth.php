<?php

namespace Core;

use Core\App;
use Core\Hash;
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
        $_SESSION['user'] = [
            'email' => $user['email'],
            'name' => $user['name'],
        ];

        session_regenerate_id(true);
    }

    public static function logout()
    {
        $_SESSION = [];

        session_destroy();

        $params = session_get_cookie_params();

        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}
