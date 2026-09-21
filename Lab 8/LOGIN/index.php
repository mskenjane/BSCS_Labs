<?php
session_start();

include("bd.php");

$errors = [];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $Cpassword = $_POST["confirm_password"];

    if(empty($username)){
        $errors[] = "Username is required";
    } else if(strlen($username < 8)){
        $errors[] = "Username must be or more than 8 characters";
    }

    $sql = "SELECT * FROM 'users' WHERE 'username' = '$username'";
    $userCheck = $conn->query($sql);
    
    if($userCheck->num_rows > 0){
        $error[] = "Account alrady exists";
    }
    
    $passwordPattern = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*[\W_]).{8.}$/';

    if($password != $Cpassword){
        $errors[] = "Password does not match";
    }

    if(!preg_match($passwordPattern, $password)){
        $errors[] = "Password must contain";
    }
    
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    if(empty($errors)){
        $sql = "INSERT INTO 'user' ('username', 'password') VALUES ('$username', '$hashedPassword')";

        $result = $conn->query($sql);

        if($result){
            echo "Registered Succesfully";
            header("Location: login.php");
            exit();
        }

    }
}

?>