<?php
    require_once  "../_Varios.php";

    $conexion = obtenerPdoConexionBD();

    $sentencia = $conexion->prepare("SELECT * FROM persona ORDER BY nombre");
    $sentencia->execute([]);
    $rs = $sentencia->fetchAll();
?>

<html>
<head>
    <meta charset='UTF-8'/>
    <link rel="stylesheet" href="../stylesheet.css"/>
</head>
<body>
<h1 class="centered">Listado de Personas</h1>
<table class="striped">
    <tr>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Telefono</th>
        <th>Estrella</th>
        <th>Eliminar</th>
    </tr>

    <?php foreach ($rs as $fila) { ?>
        <tr>
            <td><a><?=$fila["nombre"]?></a></td>
            <td><a><?=$fila["apellidos"]?></a></td>
            <td class="centered"><a><?=$fila["telefono"]?></a></td>
            <td class="centered"><a><?=($fila["estrella"]) ? "⭐" : "No" ?></a></td>
            <td class="centered"><a> X </a></td>
        </tr>
    <?php } ?>
</table>
<br/>
<a href='../categories/CategoriasIndex.php'>Gestionar listado de Categorias</a>
</body>
</html>