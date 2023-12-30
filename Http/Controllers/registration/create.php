<?php

use Core\Session;

return view('registration/create', [
    'errors' => Session::get('errors')
]);