<?php
// Intercalar una página de confirmar eliminación entre el listado y la eliminación definitiva.
// Esa página intermedia mostrará una pregunta y un link "SÍ, ELIMINAR" y otro link "Cancelar",
// y actuarán acorde a lo visto en clase.

require_once "Varios.php";
$id = $_GET['id'] ?? null;
if ($id == null || trim($id) == "") { redirect("./CategoriaIndex.php"); }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="stylesheet.css"/>
</head>
<body>
    <div>
        <h1 class="centered">¿Estás seguro de que quieres eliminar esta categoría?</h1>

        <p class="centered"><a href="CategoriaDestroy.php?id=<?=$id?>">SÍ, ELIMINAR</a></p>
        <p class="centered"><a href="CategoriaIndex.php">Cancelar</a></p>
    </div>
</body>
</html>
