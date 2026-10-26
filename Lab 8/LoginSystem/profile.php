<?php
 
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
        <input type="text" name="address" value=""> //Phone Number
        <input type="text" name="address" value="">
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
        echo $succes;
    }

    foreach ($errors as $error){
        echo $error . "<br";
    }
    ?>
</body>
</html>