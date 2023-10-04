<?php
	require_once "../_Varios.php";

	$conexion = obtenerPdoConexionBD();

    $id = $_REQUEST['id'] ?? null;
    $mensaje = $_REQUEST['mensaje'] ?? null;

	// Los campos que incluyo en el SELECT son los que luego podré leer
    // con $fila["campo"].
	$sql = "SELECT id, nombre, color FROM categoria ORDER BY nombre";

    $sentencia = $conexion->prepare($sql);
    $sentencia->execute([]); // Array vacío porque la consulta preparada no requiere parámetros.
    $rs = $sentencia->fetchAll();
?>

<html>
<head>
	<meta charset='UTF-8'/>
    <link rel="stylesheet" href="../stylesheet.css"/>
</head>
<body>
    <h1 class="centered">Listado de Categorías</h1>
    <table class="striped">
        <tr>
            <th>Nombre</th>
            <th>Color</th>
            <th>Eliminar</th>
        </tr>

        <?php foreach ($rs as $fila) { ?>
            <tr>
                <td><a href='CategoriasShow.php?id=<?=$fila["id"]?>'><?=$fila["nombre"]?></a></td>
                <td class="centered" bgcolor="<?=$fila["color"]?>"></td>
                <td class="centered"><a href='CategoriasDestroy.php?id=<?=$fila["id"]?>'> X </a></td>
            </tr>
        <?php } ?>
    </table>
    <br/>
    <a href='CategoriasCreate.php'>Crear entrada</a>
    <br/>
    <br/>
    <a href='../people/PersonasIndex.php'>Gestionar listado de Personas</a>
    <?= !($id == null || trim($id) == "" || $mensaje == null || trim($mensaje) == "")
        ? "<br/><br/>" .
        "<p class='red'>$id - $mensaje</p>"
        : ""
    ?>
</body>
</html>