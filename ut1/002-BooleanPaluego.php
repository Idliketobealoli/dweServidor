<?php
    $yesorno = true; // si se cambia el true por false logicamente devolvera el codigo dentro del else.
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p><?php if ($yesorno) { echo "¡Hola, mundo!"; } else { echo "¡Adios, mundo!"; }?></p>
</body>
</html>
