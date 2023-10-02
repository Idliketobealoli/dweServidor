<?php
//Una columna con un link dirigido a CategoriaShow.php?id=777 (el id que toque en cada fila).
//Otra columna con un link dirigido a CategoriaDestroy.php?id=777

require_once "Varios.php";
$connectionString = obtainPdoConnectionDB();

try {
    $categories = $connectionString -> prepare("SELECT * FROM categoria");
    $categories -> execute([]);
}
catch (PDOException $e) {
    loginError("Error al realizar la consulta SELECT * FROM categoria : " . $e->getMessage());
    exit("Error al realizar la consulta SELECT * FROM categoria");
}
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
<h1 class="centered">Agenda</h1>
<table class="striped">
    <tr>
        <th>Nombre</th>
        <th>Eliminar</th>
    </tr>
    <?php
    while ($category = $categories -> fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>" .
            "<td><a href='CategoriaShow.php?id=".($category['id'])."'>".($category['nombre'])."</a></td>" .
            "<td class='centered'><a href='CategoriaDestroyConfirm.php?id=".($category['id'])."'> X </a></td>" .
            "</tr>";
    }
    ?>
</table>
</body>
</html>