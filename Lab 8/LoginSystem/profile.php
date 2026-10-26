<?php
include("db.php");

$errors = [];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $address = $_POST["address"];

    if(empty($address)){
        $errors[] = "Phone Address is required";
    }

    $result = pg_query_params($conn, 'SELECT * FROM users WHERE address = $1', [$address]);
    $user = pg_fetch_assoc($result);
    
    if ($user){
        if (password_verify($password, $user['password'])){
            $_SESSION['username'] = $user['username'];
            header("location: dashboard.php");
            exit();
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
    <H3>Edit Profile</H3>
    <form method="POST">
        <label for="address">Address: </label>
        <input type="text" name="address" value="">

        <br>
        <label for="phone">Phone:  </label>
        <input type="text" name="phone" value="">

        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <br><br>
        <button type="submit">Update</button>
    </form>

    <br><br>
    <?php echo $user['address'] . "<br>"; ?> <a href="dashboard.php">Delete</a>
    <br><br>
    <a href="dashboard.php">Back to Dashboard</a>
    <?php

    if ($success){
        echo $success;
    }

    foreach ($errors as $error){
        echo $error . "<br";
    }
    ?>
</body>
</html>