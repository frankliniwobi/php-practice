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

            function filterByAge(array $array, int $age = 20) {
                $filteredData = [];

                foreach ($array as $data) {
                    if ($data["age"] >= $age) {
                        $filteredData[] = $data;
                    }
                }

                return $filteredData;
            }


        ?>

        <?php foreach ($people as $person) : ?>
        <span>Name : <?php echo  $person["name"] ?></span> <br>
        <span>Age : <?php echo  $person["age"] ?></span> <br>
        <span>Age : <?php echo  $person["gender"] ?></span> <br> <br>
        <?php endforeach; ?>

        <!--- Filter persons with age greater than 20 -->
        <p>Filter by Age</p>
        <?php foreach (filterByAge($people, 20) as $data) : ?>
        <span>Name : <?php echo  $data["name"] ?></span> <br>
        <span>Age : <?php echo  $data["age"] ?></span> <br>
        <span>Age : <?php echo  $data["gender"] ?></span> <br> <br>
        <?php endforeach; ?>
    </ul>

</body>

</html>
