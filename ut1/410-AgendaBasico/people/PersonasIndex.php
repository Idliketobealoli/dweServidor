<?php
    require_once  "../_Varios.php";

    $conexion = obtenerPdoConexionBD();

    $id = $_REQUEST['id'] ?? null;
    $mensaje = $_REQUEST['mensaje'] ?? null;

    $sentencia = $conexion->prepare("SELECT * FROM persona ORDER BY nombre");
    $sentencia->execute([]);
    $rs = $sentencia->fetchAll();
?>

<html lang="es">
<head>
    <meta charset='UTF-8'/>
    <link rel="stylesheet" href="../stylesheet.css"/>
</head>
<body>
<h1 class="centered">Listado de Personas</h1>
<table class="striped">
    <tr>
        <th>Nombre</th>
        <th>Eliminar</th>
    </tr>

    <?php foreach ($rs as $fila) { ?>
        <tr>
            <td><a  href='PersonasShow.php?id=<?=$fila["id"]?>'><?=$fila["nombre"]?> <?=$fila["apellidos"]?></a></td>
            <td class="centered"><a href='PersonasDestroy.php?id=<?=$fila["id"]?>'> X </a></td>
        </tr>
    <?php } ?>
</table>
<br/>
<a href='PersonasCreate.php'>Crear persona</a>
<br/>
<br/>
<a href='../categories/CategoriasIndex.php'>Gestionar listado de Categorias</a>
<?= !($id == null || trim($id) == "" || $mensaje == null || trim($mensaje) == "")
    ? "<br/><br/>" .
    "<p class='red'>$id - $mensaje</p>"
    : ""
?>
</body>
</html>