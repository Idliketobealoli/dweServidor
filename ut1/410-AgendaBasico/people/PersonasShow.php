<?php
    require_once "../_Varios.php";

    $personaId = $_REQUEST['id'] ?? null;
    if ($personaId == null || trim($personaId) == "") { redireccionar("./PersonasIndex.php"); }

    $conexion = obtenerPdoConexionBD();
    $select = $conexion->prepare("SELECT * FROM persona WHERE id=?");
    $select->execute([$personaId]);
    $fila = $select->fetch();

    $categoriaId = $fila["categoriaId"] ?? -1;

    // ahora vamos a coger los datos de las personas:
    $categoria = $conexion -> prepare("SELECT nombre FROM categoria WHERE id = ?");

    $categoria -> execute([$categoriaId]);
    $filaCategoria = $categoria->fetch(PDO::FETCH_ASSOC);
    $categoriaNombre = $filaCategoria["nombre"] ?? "Not found.";
?>

<html>
<head>
    <meta charset='UTF-8'>
    <link rel="stylesheet" href="../stylesheet.css"/>
</head>
<body>
<h1 class="centered">Ver persona</h1>
<table class="striped">
    <tr>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Telefono</th>
        <th>Estrella</th>
        <th>Categoria</th>
    </tr>
    <?= "<tr>" .
    "<td>".($fila['nombre'])."</td>" .
    "<td>".($fila['apellidos'])."</td>" .
    "<td class='centered'>".($fila['telefono'])."</td>" .
    "<td class='centered'>".(($fila['estrella']) ? "⭐" : "◼️")."</td>" .
    "<td class='centered'>".$categoriaNombre."</td></tr>"
    ?>
</table>
<br />
<a href='PersonasEdit.php?id=<?=$personaId?>'>Editar persona</a>
<br />
<a href='PersonasDestroy.php?id=<?=$personaId?>'>Eliminar persona</a>
<br />
<a href='PersonasIndex.php'>Volver al listado de personas.</a>
</body>
</html>
