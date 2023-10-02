<?php
require_once "DBConnection.php";
$id = $_GET['id'] ?? -1;

$connectionString = getConnectionString();

$sentence = $connectionString -> prepare("SELECT * FROM persona WHERE categoriaId = ?");
$sentence -> execute([$id]);
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
    while ($person = $sentence -> fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>" .
            "<td>".($person['nombre'])."</td>" .
            "<td>".($person['apellidos'])."</td>" .
            "<td>".($person['telefono'])."</td>" .
            "<td>".(($person['estrella']) ? "Si" : "No")."</td></tr>";
    }
    ?>
</table>
</body>
</html>