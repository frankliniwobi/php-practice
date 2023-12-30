<?php

namespace Core\Middleware;

use Core\Session;

class Guest
{
    public function handle()
    {
        if (Session::has('user') ?? false) {
            redirect_to('/');
        }
    }
}