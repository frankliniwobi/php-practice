<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
</head>

<body>
    <h1>
        <?php
        $greeting = "Hello";
        echo "$greeting World PHP 2!";
      ?>
    </h1>

    <?php
        $names = [
            "John",
            "Doe",
            "Jane",
        ];
    ?>

    <ul>
        <?php
            foreach ($names as $name) {
                echo "<li>$name</li> <br/>";
            }
        ?>

        <!-- A shorter syntax with HTML in between-->
        <?php foreach ($names as $name) : ?>
        <li>
            <?php echo $name; ?>
        </li>
        <?php endforeach; ?>

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

            foreach ($filtered as $data) {
                echo "me";
            }
        ?>
    </ul>

</body>

</html>
