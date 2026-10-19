<?php
session_start();

include("db.php");

$errors = [];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];

    if(empty($username)){
        $errors[] = "Username is required";
    }

    $result = pg_query_params($conn, 'SELECT * FROM users WHERE username = $1', [username]);
    $user = ph_fetch_assoc($result);
    
    if ($user){
        if (password_verify($password, $user['password'])){
            $_SESSION['username'] = $user['username'];
            header("location: dashboard.php");
            exit();
        }
    }
    // if($result->num_rows == 1){
    //     $user = mysqli_fetch_assoc($result);

    //     if(password_verify($password, $user['password'])){
    //         $_SESSION['username'] = $username;
    //         header("location: dashboard.php");
    //     }
    // }
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