<?php
    $num1      = $_REQUEST['operator1'] ?? null;
    $num2      = $_REQUEST['operator2'] ?? null;
    $operation = $_REQUEST['operation'] ?? null;

    $errorDivZero = false;
    $result = "Syntax error";
    
    if ($num1 != null && $num2 != null && $operation != null) {
        switch ($operation) {
            case 'add': { $result = $num1 + $num2; break; }
            case 'sub': { $result = $num1 - $num2; break; }
            case 'mul': { $result = $num1 * $num2; break; }
            case 'div': {
                if ($num2 == 0) { $errorDivZero = true; }
                else { $result = $num1 / $num2; }
                break;
            }
        }
    }
    if ($operation != null) {
        switch ($operation) {
            case 'add': { $operation = "addition"; break; }
            case 'sub': { $operation = "subtraction"; break; }
            case 'mul': { $operation = "multiplication"; break; }
            case 'div': { $operation = "division"; break; }
        }
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
    <style>
        h1 { font-style: italic; }
        div { text-align: justify; }
        hr.solid { border-top: 3px solid #bbb; }
    </style>
</head>
<body>
    <h1>Calculator</h1>
    <div>
        Number 1: <code><?= $num1 == null ? "Not selected" : $num1; ?></code> <br/>
        Number 2: <code><?= $num2 == null ? "Not selected" : $num2; ?></code> <br/>
        Type of operation: <code><?= $operation == null ? "Not selected" : $operation; ?></code> <br/>
        <hr class="solid">
        <code><?= $errorDivZero ? "Error: Cannot divide by zero." : "Result: $result"; ?></code>
    </div>
</body>
</html>
