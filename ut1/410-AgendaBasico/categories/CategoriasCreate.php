<?php
// Lo siguiente es para saber cual es el valor del ultimo indice en la BBDD

// require_once "_Varios.php";
// $conexionBD = obtenerPdoConexionBD();
// $findAll = $conexionBD->prepare("SELECT id FROM categoria ORDER BY id");
// $findAll->execute([]);
// $rs = $findAll->fetchAll();

// $maxId = end($rs);
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
    <h1 class="centered">Crear categoría</h1>
    <form action="CategoriasCreated.php" class="centered">
        <label for="categoryName" class="centered">Nombre de la categoria: </label>
        <input type="text" name="categoryName" id="categoryName" placeholder="Nombre"
               required class="normal centered"/><br/><br/>
        <label for="categoryColor" class="centered">Color de la categoria: </label>
        <input type="color" name="categoryColor" id="categoryColor"
               required class="normal centered"/><br/><br/>
        <input type='submit' value='Submit' class="centered"/>
    </form>
</body>
</html>