<?php
require_once "../_Varios.php";

$conexionBD = obtenerPdoConexionBD();

$name = $_GET['categoryName'] ?? null;
$color = $_GET['categoryColor'] ?? null;

$categoriesWithSameName = $conexionBD->prepare("SELECT nombre FROM categoria WHERE nombre = ?");
$categoriesWithSameName->execute([trim($name)]);
$repeated = $categoriesWithSameName->fetchAll();

if (!($name == null || trim($name) == "" || $color == null || trim($color) == "")
    && sizeof($repeated) == 0) {
    $sentencia = $conexionBD->prepare("INSERT INTO categoria (nombre, color) VALUES (?, ?)");
    $correcto = $sentencia->execute([trim($name), trim($color)]); // Se añade el parámetro a la consulta preparada.

    if ($correcto) redireccionar("CategoriasIndex.php?id=$name&mensaje=creado");
}
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error</title>
    <link rel="stylesheet" href="../stylesheet.css"/>
</head>
<body>
<h3 class="centered red">Error al crear.</h3>
</body>
</html>