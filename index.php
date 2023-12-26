<!-- Associative Array -->
<?php

$people = [
    [
        "name" => "John",
        "gender" => "Male",
        "age" => 30,
    ],
    [
        "name" => "Doe",
        "gender" => "Male",
        "age" => 20,
    ],
    [
        "name" => "Jane",
        "gender" => "Female",
        "age" => 15,
    ],
];

$filtered = array_filter($people, function($data) {
    return $data['age'] >= 20;
});

require "index.view.php";
