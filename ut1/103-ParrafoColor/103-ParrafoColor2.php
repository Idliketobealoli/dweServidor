<?php
    $selectedColor = $_GET['selectColor'] ?? null;
    $typedColor = $_GET['typedColor'] ?? null;

    // This could most likely be put elsewhere, but I think it looks cleaner this way.
    $usedColor = ($typedColor != null && preg_match('/#(?:[0-9a-fA-F]{6})/', $typedColor) == 1) ?
        $typedColor : ($selectedColor != null ? $selectedColor : 'Grey')
    /* This way, the typed color has priority over the selected color, so
     * we will only be able to see the text in the selected color if the
     * text box is empty or does not match the pattern.
     * Lastly, if we did not select or type anything, it shows in grey.
    */
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        h1 { color: <?=$usedColor?>; }
        div { color: <?=$usedColor?>; text-align: justify;}
        img { padding-left: 20px; padding-right: 20px; }
    </style>
</head>
<body>
    <img align='right' src='https://upload.wikimedia.org/wikipedia/commons/thumb/2/22/Hidetaka_Miyazaki%2C_The_Game_Awards_2022_%28cropped%29.png/330px-Hidetaka_Miyazaki%2C_The_Game_Awards_2022_%28cropped%29.png' alt='An image of Hidetaka Miyazaki' height='300'/>
    <h1 align='left'>Hidetaka Miyazaki</h1>
    <div align='left'>
        Hidetaka Miyazaki (nacido en Shizuoka, Prefectura de Shizuoka, Japón)
        es un diseñador de videojuegos japonés y actual presidente de la compañía de videojuegos From Software.
        Miyazaki empezó a trabajar en From Software como programador en el 2004,
        y después de trabajar en la saga Armored Core, se hizo conocido por crear la franquicia Souls.
        Aunque Miyazaki ha dirigido los dos primeros videojuegos de la serie, decidió tomar un papel menos
        activo en el desarrollo de Dark Souls II, supervisando el proyecto mientras Tomohiro Shibuya y Yui Tanimura
        se encargaron de la co-dirección.
    </div>
</body>
</html>