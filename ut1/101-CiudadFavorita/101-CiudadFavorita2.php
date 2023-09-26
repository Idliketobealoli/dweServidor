<?php
    $favoriteCity = $_GET['favCity'];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>101-CiudadFavorita2</title>
</head>
<body>
    <?php
        if ($favoriteCity == null) {
            $favoriteCity = "UwU";
            echo
            "<b><i>You did not type anything, so 
            <a href='https://www.google.com/search?q=$favoriteCity'>
            click here</a>.</i></b>";
        }
        else {
            echo
            "<h2>Your favorite city is $favoriteCity</h2>\n
            <a href='https://www.google.com/search?q=$favoriteCity'>
            More info about $favoriteCity</a>";
        }
    ?>
</body>
</html>
