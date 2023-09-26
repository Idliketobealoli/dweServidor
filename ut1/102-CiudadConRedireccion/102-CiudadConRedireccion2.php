<?php
$favoriteCity = $_GET['favCity'] ?? null;
if ($favoriteCity == null || trim($favoriteCity) == "") {
    header("Location: ./102-CiudadConRedireccion1.php?error=1");
    exit(0);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>102-CiudadConRedireccion2</title>
</head>
<body>
    <h2>Your favorite city is <?=$favoriteCity?></h2>
    <a href='https://www.google.com/search?q=<?=$favoriteCity?>'>
        More info about <?=$favoriteCity?></a>
</body>
</html>
