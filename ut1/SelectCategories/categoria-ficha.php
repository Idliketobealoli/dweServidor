<?php
require_once "DBConnection.php";
$id = $_GET['id'] ?? -1;

$connectionString = getConnectionString();

$people = $connectionString -> query("SELECT * FROM persona WHERE categoriaId = $id");
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
        <th>Apellidos</th>
        <th>Telefono</th>
        <th>Estrella</th>
    </tr>
    <?php
    while ($person = $people -> fetch(PDO::FETCH_ASSOC)) {
        $pName = $person['nombre'];
        $pSurname = $person['apellidos'];
        $pPhone = $person['telefono'];
        $pStar = $person['estrella'] == 1; // true if 1, false otherwise.

        echo "<tr>" .
            "<td>$pName</td>" .
            "<td>$pSurname</td>" .
            "<td>$pPhone</td>" .
            "<td>";
        echo $pStar ? "Si" : "No";
        echo "</td></tr>";
    }
    ?>
</table>
</body>
</html>