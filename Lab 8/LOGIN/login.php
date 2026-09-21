<?php
session_start();

include("bd.php");

$errors = [];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];

    if(empty($errors)){
        $sql = "SELECT * FROM 'users' WHERE 'username' = '$username'";
        //$user = $conn->query;
    }

    if(empty($username)){
        $errors[] = "Username is required";
    }

    $sql = "SELECT * FROM 'users' WHERE 'username' = '$username'";
    $result = $conn->query($sql);

    if($result->num_rows == 1){
        $user = mysqli_fetch_assoc($result);

        if(password_verify($password, $user['password'])){
            $_SESSION['username'] = $username;
            header("location: dashboard.php")
        }
    }
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
    <h3>Login System</h3>
    
    <form method="POST">
        <label for="username">Enter Username:
            <input type="text" placeholder="Username" name="username">
        </label> 
        <br>
        <br>
        <label for="password">Enter Password:
            <input type="password" placeholder="Password" name="password">
        </label>
        <br>
        <br>
        <button type="submit">Login</button>
    </form>
    <p style="color: red">
        <?php 

            foreach($errors as $error){
                echo $error . "<br>";
            }

        ?>
</body>
</html>