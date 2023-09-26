<?php
    $operations = [
        "add" => "suma",
        "sub" => "resta",
        "mul" => "multiplicacion",
        "div" => "division",
    ];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>110-CalculadoraFormulario1</title>
</head>
<body>
<form action="./110-CalculadoraFormulario2.php">
    <label for='operator1'>First number: </label>
    <input type='number' id='operator1' name="operator1"/><br/>

    <label for='operation'>Operation: </label>
    <select id='operation' name='operation'>
        <option value='99' selected disabled>Select an operation</option>
        <?php
        foreach ($operations as $operationId => $operation) {
            echo "<option value='$operationId'>$operation</option>";
        }
        ?>
    </select><br/>

    <label for='operator2'>Second number: </label>
    <input type='number' id='operator2' name="operator2"/><br/>

    <input type='submit' value='Submit'>
</form>
</body>
</html>