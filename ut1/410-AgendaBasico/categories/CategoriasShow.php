<?php
	require_once "../_Varios.php";

    // Se recoge el parámetro "id" de la request.
    $categoriaId = $_REQUEST['id'] ?? null;
    if ($categoriaId == null || trim($categoriaId) == "") { redireccionar("./CategoriasIndex.php"); }

    $conexion = obtenerPdoConexionBD();
    $sqlCategoria = "SELECT * FROM categoria WHERE id=?";
    $select = $conexion->prepare($sqlCategoria);
    $select->execute([$categoriaId]); // Se añade el parámetro a la consulta preparada.
    $fila = $select->fetch();

    // Con esto, accedemos a los datos de la primera (y esperemos que única) fila que haya venido.
    $categoriaNombre = $fila["nombre"] ?? "Not found.";

    // ahora vamos a coger los datos de las personas:
    $people = $conexion -> prepare("SELECT * FROM persona WHERE categoriaId = ?");

    $people -> execute([$categoriaId]);
?>

<html>
<head>
	<meta charset='UTF-8'>
    <link rel="stylesheet" href="../stylesheet.css"/>
</head>
<body>
    <h1 class="centered">Ver categoría</h1>
    <p class="centered dodgerblue">Nombre: <?=$categoriaNombre?></p>
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
    <br />
    <a href='CategoriasEdit.php?id=<?=$categoriaId?>'>Editar categoría</a>
    <br />
    <a href='CategoriasDestroy.php?id=<?=$categoriaId?>'>Eliminar categoría</a>
    <br />
    <a href='CategoriasIndex.php'>Volver al listado de categorías.</a>
</body>
</html>