<?php
require_once "../_Varios.php";

// Se recoge el parámetro "id" de la request.
$personaId = $_REQUEST['id'] ?? null;
if ($personaId == null || trim($personaId) == "") { redireccionar("./PersonasIndex.php"); }

$conexion = obtenerPdoConexionBD();
$select = $conexion->prepare("SELECT * FROM persona WHERE id = ?");
$select->execute([trim($personaId)]);
$fila = $select->fetch();

$sentencia = $conexion->prepare("SELECT id, nombre FROM categoria ORDER BY nombre");
$sentencia->execute([]);
$rs = $sentencia->fetchAll();


$personaNombre = $fila["nombre"] ?? null;
$personaApellidos = $fila["apellidos"] ?? null;
$personaTlf = $fila["telefono"] ?? null;
$personaStar = $fila["estrella"] ?? null;
$personaCategoria = $fila["categoriaId"] ?? null;
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
<h1 class="centered">Editar persona: <?=($personaNombre != null && $personaApellidos != null) ? trim($personaNombre)." ".trim($personaApellidos) : "Not found" ?></h1>
<form action="PersonasEdited.php" class="centered">
    <label for="personaTlf" class="centered">Cambiar el telefono de la persona: </label>
    <input type="number" min="100000000" max="999999999" name="personaTlf" id="personaTlf" placeholder="000000000"
           class="normal centered"/><br/><br/>

    <label for="personaStar" class="centered">¿Es estrella?: </label>
    <select name="personaStar" id="personaStar" class="normal centered">
        <option value="0" selected>No</option>
        <option value="1" selected>Si</option>
    </select><br/><br/>

    <label for="personaCategory" class="centered">Categoria a la que pertenece: </label>
    <select id="personaCategory" name="personaCategory" class="normal centered">
        <option value="-1" selected disabled>Categoria</option>
        <?php
        foreach ($rs as $category) {
            echo "<option value='".$category['id']."'>".$category['nombre']."</option>";
        }
        ?>
    </select><br/><br/>

    <input type="hidden" name="personaId" id="personaId" value="<?=trim($personaId)?>"/>
    <input type='submit' value='Submit' class="centered"/>
</form>
</body>
</html>