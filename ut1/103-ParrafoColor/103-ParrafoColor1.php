<?php
    $colors = [
        "Violet" => "Violeta",
        "DeepPink" => "Rosa intenso",
        "SpringGreen" => "Verde primavera",
        "Lime" => "Lima",
        "Gold" => "Dorado",
        "LightSkyBlue" => "Azul cielo claro",
        "Aquamarine" => "Aguamarina",
        "Turquoise" => "Turquesa",
        "SlateBlue" => "Azul pizarra",
        "SaddleBrown" => "Marron montura"
    ];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>103-ParrafoColor1</title>
</head>
<body>
    <form action='./103-ParrafoColor2.php'>
        <label for='selectColor'>Select a color:</label>
        <select id='selectColor' name='selectColor'>
            <option value='99' selected disabled>Color</option>
            <?php
            foreach ($colors as $colorId => $color) {
                echo "<option value='$colorId'>$color</option>";
            }
            ?>
        </select><br/><br/>
        <label for='typedColor'>Or type a color here: </label>
        <input type='text' id="typedColor" name='typedColor' placeholder='#000000'/><br/><br/>
        <input type='submit' value='Submit'/>
    </form>
</body>
</html>