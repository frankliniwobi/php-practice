<?php

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

$router->get('/posts', 'controllers/posts/index.php')->middleware('auth');
$router->post('/posts', 'controllers/posts/store.php')->middleware('auth');
$router->get('/post', 'controllers/posts/show.php')->middleware('auth');
$router->put('/post', 'controllers/posts/update.php')->middleware('auth');
$router->delete('/post', 'controllers/posts/destroy.php')->middleware('auth');
$router->get('/posts/create', 'controllers/posts/create.php')->middleware('auth');
$router->get('/post/edit', 'controllers/posts/edit.php')->middleware('auth');

$router->get('/register', 'controllers/registration/create.php')->middleware('guest');
$router->post('/register', 'controllers/registration/store.php')->middleware('guest');

$router->get('/login', 'controllers/login/create.php')->middleware('guest');
$router->post('/login', 'controllers/login/store.php')->middleware('guest');
$router->delete('/login', 'controllers/login/destroy.php')->middleware('auth');
