<?php

require "functions.php";

$url = $_SERVER["REQUEST_URI"];

if ($url === '/') {
    require "controllers/index.php";
} elseif ($url === '/about') {
    require "controllers/about.php";
} elseif ($url === '/contact') {
    require "controllers/contact.php";
}
