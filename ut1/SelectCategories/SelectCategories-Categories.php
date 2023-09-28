<?php
require_once "DBConnection.php";
$connectionString = getConnectionString();

// Use this one in case you want to fetch one at a time.
$categories = $connectionString -> query("SELECT * FROM categoria");

// Use this one in case you want to fetch all at once and then iterate through the array.
// $categories = $connectionString -> query("SELECT * FROM categoria")->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="stylesheet.css"/>
</head>
<body>
    <table class="striped">
        <tr>
            <th>Nombre</th>
        </tr>
        <?php
        // Use this loop in case you want to fetch one at a time.
        while ($category = $categories -> fetch(PDO::FETCH_ASSOC)) {
            $categoryId = $category['id'];
            $categoryName = $category['nombre'];

            echo "<tr>" .
                "<td><a href='categoria-ficha.php?id=$categoryId'>$categoryName</a></td>" .
                "</tr>";
        }

        // Use this loop in case you want to fetch all at once and then iterate through an array.
        /*
        foreach ($categories as $category) {
            $categoryId = $category['id'];
            $categoryName = $category['nombre'];
            echo "<tr>" .
                "<td><a href='categoria-ficha.php?id=$categoryId'>$categoryName</a></td>" .
                "</tr>";
        }
        */
        ?>
    </table>
</body>
</html>
