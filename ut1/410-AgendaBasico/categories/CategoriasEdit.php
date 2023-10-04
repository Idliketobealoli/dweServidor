<?php
    require_once "../_Varios.php";

    // Se recoge el parámetro "id" de la request.
    $categoriaId = $_REQUEST['id'] ?? null;
    if ($categoriaId == null || trim($categoriaId) == "") { redireccionar("./CategoriasIndex.php"); }

    $conexion = obtenerPdoConexionBD();
    $sqlCategoria = "SELECT nombre FROM categoria WHERE id = ?";
    $select = $conexion->prepare($sqlCategoria);
    $select->execute([trim($categoriaId)]); // Se añade el parámetro a la consulta preparada.
    $fila = $select->fetch();

    // Con esto, accedemos a los datos de la primera (y esperemos que única) fila que haya venido.
    $categoriaNombre = $fila["nombre"] ?? null;
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
<h1 class="centered">Editar categoría: <?=($categoriaNombre != null) ? trim($categoriaNombre) : "Not found" ?></h1>
<form action="CategoriasEdited.php" class="centered">
    <label for="categoryName" class="centered">Cambiar el nombre de la categoria: </label>
    <input type="text" name="categoryName" id="categoryName" placeholder="<?=trim($categoriaNombre)?>"
           class="normal centered"/><br/><br/>
    <label for="categoryColor" class="centered">Cambiar el color de la categoria: </label>
    <input type="color" name="categoryColor" id="categoryColor"
           required class="normal centered"/><br/><br/>
    <input type="hidden" name="categoryId" id="categoryId" value="<?=trim($categoriaId)?>"/>
    <input type='submit' value='Submit' class="centered"/>
</form>
</body>
</html>
