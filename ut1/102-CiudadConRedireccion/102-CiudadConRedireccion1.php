<?php
    $error = $_GET['error'] ?? null;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>102-CiudadConRedireccion1</title>
    <style>
        input.normal { border-color: aqua; }
        input.error { border-color: red; }
    </style>
</head>
<body>
<form action="./102-CiudadConRedireccion2.php">
    <label for='favCity'>What's your favorite city?</label><br/>
    <input type='text' id='favCity' name='favCity'
           placeholder='<?= $error != null ? "Introduce a valid city name." : "Introduce a city." ?>'
           class='<?= $error != null ? "error" : "normal" ?>'/><br/>
    <input type='submit' value='Submit'>
</form>
</body>
</html>