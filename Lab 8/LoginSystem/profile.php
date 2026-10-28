<?php
session_start();
include('db.php');

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$errors = [];
$success = "";

$username = $_SESSION['username'];
$result = pg_query_params($conn, 'SELECT * FROM users WHERE username = $1', [$username]);
$user = pg_fetch_assoc($result);

if (!$user) {
    session_destroy();
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $address = trim($_POST['address']); // Bata Prk bato ambot ano na, bacolod
    $phone = trim($_POST['phone']);

    if (empty($address)) {
        $errors[] = "Address is required";
    }

    if (empty($errors)) {

        pg_query_params(
            $conn,
            'UPDATE users SET address = $1 WHERE username = $2',
            [$address, $username]
        );

        // $user['address'] = trim($_POST['address']);
        $success = "Address updated successfully";
    }

    if (empty($phone)) {
        $errors[] = "Contact number is required";
    }

    if (empty($errors)) {
        
        pg_query_params(
            $conn,
            'UPDATE users SET number = $1 WHERE username = $2',
            [$phone, $username]
        );

        // $user['address'] = trim($_POST['address']);
        $success = "Phone number updated successfully";
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