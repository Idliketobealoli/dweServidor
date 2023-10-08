<?php
require_once "../_Varios.php";

$conexionBD = obtenerPdoConexionBD();

$name = $_GET['personaName'] ?? null;
$apellidos = $_GET['personaApellidos'] ?? null;
$tlf = $_GET['personaTlf'] ?? null;
$star = $_GET['personaStar'] ?? false;
$category = $_GET['personaCategory'] ?? null;

$peopleWithSameTlf = $conexionBD -> prepare("SELECT telefono FROM persona WHERE telefono = ?");
$peopleWithSameTlf -> execute([trim($tlf)]);
$repeated = $peopleWithSameTlf -> fetchAll();

if (!($name == null || trim($name) == "" || $apellidos == null || trim($apellidos) == "" ||
        $tlf == null || trim($tlf) == "" || $star == null || $category == null || trim($category) == "")
&& sizeof($repeated) == 0) {
    $sentencia = $conexionBD->prepare("INSERT INTO persona (nombre, apellidos, telefono, estrella, categoriaId) VALUES (?, ?, ?, ?, ?)");
    $correcto = $sentencia->execute([trim($name), trim($apellidos), trim($tlf), trim($star), trim($category)]);

    if ($correcto) redireccionar("PersonasIndex.php?id=$name&mensaje=creado");
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
