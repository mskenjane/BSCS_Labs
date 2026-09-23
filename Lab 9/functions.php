<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $num1 = (int) $_POST['num1'];
    $num2 = (int) $_POST['num2'];
    
    echo Calculate($_POST["op"], $num1, $num2);

    /*switch($_POST["op"]){
        case 'sum':
            echo Add($num1, $num2);
            break;
        case 'sub':
            echo (int) $diff = $num1 - $num2;
            break;
        case 'mul':
            echo (int) $prod = $num1 * $num2;
            break;
        case 'div':
            echo (int) $quo = $num1 / $num2;
            break;
    }*/

}
function Calculate(string $op, int $num1, int $num2){
        
    switch($op){
        case 'sum':
                return (int) $op = $num1 - $num2;
        case 'sub':
                return (int) $op = $num1 - $num2;
        case 'mul':
                return (int) $op = $num1 * $num2;
        case 'div':
                return (int) $op = $num1 / $num2;
    }
    return $op;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="num1">
        <br><br>
        <input type="text" name="num2">
        <br><br>
        <select name="op" id="">
            <option value="sum">Addition</option>
            <option value="sub">Subtract</option>
            <option value="mul">Multiply</option>
            <option value="div">Divide</option>
        </select>
        <button type="submit">Calculate</button>

    </form>            
</body>
</html>