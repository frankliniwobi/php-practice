<?php

require "functions.php";

// require "router.php";

// Connect to the MySQL database.
$dsn = "mysql:host=localhost;port=3306;dbname=demo;user=root;charset=utf8mb4";

$pdo = new PDO($dsn);

$statement = $pdo->prepare("select * from posts");
$statement->execute();

$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

// dd($post);

foreach ($posts as $post) {
    echo "<li>" . $post['title'] . "</li>";
}
