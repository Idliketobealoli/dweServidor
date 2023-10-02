<?php
//Recoge el id de la request.
//Lanza una Select a la BD para recuperar "el resto" de los campos de la categoría (es decir, solo el nombre).
//Saca en un formato adecuado "los" campos (el único campo).

require_once "Varios.php";
$id = $_GET['id'] ?? null;
if ($id == null || trim($id) == "") { redirect("./CategoriaIndex.php"); }

$connectionString = obtainPdoConnectionDB();

try {
    $categories = $connectionString -> prepare("SELECT nombre FROM categoria WHERE id = ?");
    $people = $connectionString -> prepare("SELECT * FROM persona WHERE categoriaId = ?");

    $categories -> execute([$id]);
    $people -> execute([$id]);
}
catch (PDOException $e) {
    loginError("Error al realizar la consulta: " . $e->getMessage());
    exit("Error al realizar la consulta.");
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
<h1 class="centered">
    <?php
    $category = $categories -> fetch(PDO::FETCH_ASSOC);
    echo !$category
        ? "Category not found."
        : $category['nombre'];
    ?>
</h1>
<table class="striped">
    <tr>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Telefono</th>
        <th>Estrella</th>
    </tr>
    <?php
    while ($person = $people -> fetch(PDO::FETCH_ASSOC)) {
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
