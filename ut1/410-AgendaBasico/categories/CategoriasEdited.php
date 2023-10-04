<?php
require_once "../_Varios.php";

$conexionBD = obtenerPdoConexionBD();

$name = $_GET['categoryName'] ?? null;
$color = $_GET['categoryColor'] ?? null;
$id = $_GET['categoryId'] ?? null;
if ($name == null || trim($name) == "") {
    $recoveredName = $conexionBD->prepare("SELECT nombre FROM categoria WHERE id = ?");
    $recoveredName->execute([trim($id)]);
    $name = $recoveredName->fetch(PDO::FETCH_ASSOC)['nombre'];
}

if (!($id == null || trim($id) == "" || $color == null || trim($color) == "" || $name == null || trim($name) == "")) {
    $sentencia = $conexionBD->prepare("UPDATE categoria SET nombre = ?, color = ? WHERE id = ?");
    $correcto = $sentencia->execute([trim($name), trim($color), trim($id)]); // Se añade el parámetro a la consulta preparada.

    if ($correcto) redireccionar("CategoriasIndex.php?id=$name&mensaje=editado");
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
<h3 class="centered red">Error al editar.</h3>
</body>
</html>
