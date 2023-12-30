<?php

namespace Core;

use Core\App;
use Core\Hash;
use Core\Session;
use Core\Database;
use Illuminate\Support\Collection;

class Auth
{
    public static $user = [];

    public static function user()
    {
        if (Session::has('user')) {

            $user = App::resolve(Database::class)
                ->query('select * from users where email = :email', [
                'email' => Session::get('user')['email']
            ])->findOrFail();

            return static::$user = new Collection([
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
            ]);
        }

        return null;
    }

    public function get($field)
    {
        return $this->user[$field];
    }

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

    public static function login($user)
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