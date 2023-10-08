<?php
    require_once "../_Varios.php";

    $conexion = obtenerPdoConexionBD();

    $persona = $_REQUEST['persona'] ?? null;

    if ($persona != null) {
        $sentencia = $conexion->prepare("SELECT * FROM persona WHERE nombre LIKE ? ORDER BY nombre");
        $sentencia->execute(["%".trim($persona)."%"]);
    }
    else {
        $sentencia = $conexion->prepare("SELECT * FROM persona WHERE id = -1707");
        $sentencia->execute([]);
    }
    $rs = $sentencia->fetchAll();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../stylesheet.css"/>
</head>
<body>
<h1 class="centered">Listado de Personas</h1>
<table class="striped">
    <tr>
        <th>Categoria</th>
        <th>Nombre</th>
        <th>Apellidos</th>
    </tr>

    <?php foreach ($rs as $fila) {
        $categoria = $conexion -> prepare("SELECT nombre FROM categoria WHERE id = ?");

        $categoria -> execute([$fila["categoriaId"]]);
        $filaCategoria = $categoria->fetch(PDO::FETCH_ASSOC);
        $categoriaNombre = $filaCategoria["nombre"] ?? "Not found.";

        echo "<tr>" .
            "<td class='centered'>" . $categoriaNombre . "</td>" .
            "<td>" . ($fila['nombre']) . "</td>" .
            "<td>" . ($fila['apellidos']) . "</td></tr>";
    } ?>
</table>
</body>
</html>