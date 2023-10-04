<?php
    require_once "../_Varios.php";

    // Se recoge el parámetro "id" de la request.
    $id = $_REQUEST['id'] ?? null;
    if ($id == null || trim($id) == "") { redireccionar("./CategoriasIndex.php"); }

    $conexionBD = obtenerPdoConexionBD();
    $sql = "DELETE FROM categoria WHERE id=?";
    $sentencia = $conexionBD->prepare($sql);
    $correcto = $sentencia->execute([trim($id)]); // Se añade el parámetro a la consulta preparada.

    //redirigimos al index con un mensaje de eliminado
    //header("Location: CompositoresIndex.php?id=$id&mensaje=eliminado");
    if ($correcto) redireccionar("CategoriasIndex.php?id=$id&mensaje=eliminado");
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
    <h3 class="centered red">Error al eliminar.</h3>
</body>
</html>
