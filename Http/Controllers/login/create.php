<?php

use Core\Session;

return view('login/create', [
    'errors' => Session::get('errors')
]);