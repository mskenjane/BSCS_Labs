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
    <H3>Delete Information</H3>
    <form method="POST">
        <label for="address">Address: </label>
        <?php echo $user['address'] . "<br>"; ?>
        <button type="delete">Delete</button>

        <br><br>
        <label for="phone">Phone: </label>
        <?php echo $user['number'] . "<br>"; ?>
        <button type="delete">Delete</button>

        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <br><br>
        <button type="accDel">Delete Account</button>
        <br><br>
        <?php if ($success){echo $user['address'] . " has been added into the profile. <br>"; } ?>
        <?php if ($success){ echo $success; } ?>
        
    </form>
</body>
</html>