<?php
    require_once "../_Varios.php";

    $conexion = obtenerPdoConexionBD();

    $sentencia = $conexion->prepare("SELECT id, nombre FROM categoria ORDER BY nombre");
    $sentencia->execute([]);
    $rs = $sentencia->fetchAll();

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
<h1 class="centered">Crear persona</h1>
<form action="PersonasCreated.php" class="centered">
    <label for="personaName" class="centered">Nombre de la persona: </label>
    <input type="text" name="personaName" id="personaName" placeholder="Nombre"
           required class="normal centered"/><br/><br/>

    <label for="personaApellidos" class="centered">Apellidos de la persona: </label>
    <input type="text" name="personaApellidos" id="personaApellidos" placeholder="Apellidos"
           required class="normal centered"/><br/><br/>

    <label for="personaTlf" class="centered">Numero de teléfono: </label>
    <input type="number" name="personaTlf" id="personaTlf" placeholder="000000000" min="100000000" max="999999999"
           required class="normal centered"/><br/><br/>

    <label for="personaStar" class="centered">¿Es estrella?: </label>
    <input type="checkbox" name="personaStar" id="personaStar"
           required class="normal centered"/><br/><br/>

    <label for="personaCategory" class="centered">Categoria a la que pertenece: </label>
    <select id="personaCategory" name="personaCategory" required class="normal centered">
        <option value="-1" selected disabled>Categoria</option>
        <?php
        foreach ($rs as $category) {
            echo "<option value='".$category['id']."'>".$category['nombre']."</option>";
        }
        ?>
    </select><br/><br/>
    <input type='submit' value='Submit' class="centered"/>
</form>
</body>
</html>