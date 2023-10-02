<?php
//Recoge el id de la request.
//Lanza un Delete a la BD para eliminar el caso que piden eliminar.
//Dice (a ciegas) que todo OK, o redirige a un lugar adecuado (idealmente, con un parámetro que haga salir un mensaje de confirmación)

require_once "Varios.php";
$id = $_GET['id'] ?? null;
if ($id == null || trim($id) == "") { redirect("./CategoriaIndex.php"); }

$connectionString = obtainPdoConnectionDB();
$successfullCall = false;

try {
    $sentence = $connectionString->prepare("DELETE FROM categoria WHERE id = ?");
    $sentence->execute([$id]);
    $successfullCall = true;
}
catch (PDOException $e) {
    loginError("Error al realizar la consulta DELETE FROM categoria WHERE id = $id : " . $e->getMessage());
}
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
    <?= $successfullCall ?
        "Categoría con id = $id borrada exitosamente." :
        "No se pudo borrar la categoría con id = $id."?>
    <p>
        Haz click <a href='CategoriaIndex.php'>aquí</a> para volver al índice.
    </p>
</body>
</html>
