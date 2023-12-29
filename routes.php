<?php

$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

$router->get('/posts', 'posts/index.php')->middleware('auth');
$router->post('/posts', 'posts/store.php')->middleware('auth');
$router->get('/post', 'posts/show.php')->middleware('auth');
$router->put('/post', 'posts/update.php')->middleware('auth');
$router->delete('/post', 'posts/destroy.php')->middleware('auth');
$router->get('/posts/create', 'posts/create.php')->middleware('auth');
$router->get('/post/edit', 'posts/edit.php')->middleware('auth');

$router->get('/register', 'registration/create.php')->middleware('guest');
$router->post('/register', 'registration/store.php')->middleware('guest');

$router->get('/login', 'login/create.php')->middleware('guest');
$router->post('/login', 'login/store.php')->middleware('guest');
$router->delete('/login', 'login/destroy.php')->middleware('auth');
