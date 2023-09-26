<?php
    $number = 1;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
    <body>
        <ul> <b><i>Example with a while loop</i></b>
            <?php
                while ($number <= 10) {
                    echo "<li>$number</li>";
                    $number++;
                }
            ?>
        </ul>

        <ul> <b><i>Example with a for loop</i></b>
            <?php
            $number = 1; //we will reset this variable back to 1
            for ($i = 1; $i < 10; $i++) {
                echo "<li>$number</li>";
                $number++;
            }
            ?>
        </ul>

        <ul> <b><i>Example with a do-while loop</i></b>
            <?php
            $number = 1; //we will reset this variable back to 1 again.
            do {
                echo "<li>$number</li>";
                $number++;
            }
            while ($number <= 10)
            ?>
        </ul>
    </body>
</html>