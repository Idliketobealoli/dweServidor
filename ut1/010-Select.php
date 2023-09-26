<?php
    $ciudades = [
        17 => "Donosti",
        8 => "Getafe",
        4 => "Toledo",
        71 => "Granada",
        52 => "Lugo",
        47 => "Zaragoza"
    ];
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
    Ciudad <select>
        <?php
            foreach ($ciudades as $cityId => $city) {
                echo "<option value='$cityId'>$city</option>";
            }
        ?>
    </select>
</body>
</html>
