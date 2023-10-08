<?php
require_once "../_Varios.php";

$conexionBD = obtenerPdoConexionBD();

$tlf = $_GET['personaTlf'] ?? null;
$star = $_GET['personaStar'] ?? null;
$personaCategory = $_GET['personaCategory'] ?? null;
$id = $_GET['personaId'] ?? null;


if ($tlf == null || trim($tlf) == "") {
    $recoveredTlf = $conexionBD->prepare("SELECT telefono FROM persona WHERE id = ?");
    $recoveredTlf->execute([trim($id)]);
    $tlf = $recoveredTlf->fetch(PDO::FETCH_ASSOC)['telefono'];
}

if ($star == null || trim($star) == "") {
    $recoveredStar = $conexionBD->prepare("SELECT estrella FROM persona WHERE id = ?");
    $recoveredStar->execute([trim($id)]);
    $star = $recoveredStar->fetch(PDO::FETCH_ASSOC)['estrella'];
}

if ($personaCategory == null || trim($personaCategory) == "") {
    $recoveredCat = $conexionBD->prepare("SELECT categoriaId FROM persona WHERE id = ?");
    $recoveredCat->execute([trim($id)]);
    $personaCategory = $recoveredCat->fetch(PDO::FETCH_ASSOC)['categoriaId'];
}

$peopleWithSameTlf = $conexionBD->prepare("SELECT telefono FROM persona WHERE telefono = ? AND id <> ?");
$peopleWithSameTlf->execute([trim($tlf), trim($id)]);
$repeated = $peopleWithSameTlf->fetchAll();

if (!($id == null || trim($id) == "" || $personaCategory == null || trim($personaCategory) == ""
        || $tlf == null || trim($tlf) == "" || $star == null)
    && sizeof($repeated) == 0) {
    $sentencia = $conexionBD->prepare("UPDATE persona SET telefono = ?, categoriaId = ?, estrella = ? WHERE id = ?");
    $correcto = $sentencia->execute([trim($tlf), trim($personaCategory), trim($star), trim($id)]); // Se añade el parámetro a la consulta preparada.

    if ($correcto) redireccionar("PersonasIndex.php?id=$id&mensaje=editado");
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
