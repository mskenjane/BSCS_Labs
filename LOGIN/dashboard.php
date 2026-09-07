<?php
session_start();

if (!isset($_SESSION["username"])){
    header("location: index.php");
    exit();
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
    <h2>hello <?php echo $_SESSION["username"]; ?></h2>

    <?php
    $testhash = "testing";
    echo password_hash($testhash, PASSWORD_DEFAULT);
    echo "<br>";
    echo "this is MD5: " . md5($testhash);
    echo "<br>";
    echo "this is SHA1: " . sha1($testhash);
    echo "<br>";
    echo "this is MD5: " . sha1($testhash);
    ?>

    <br>
    <a href="logout.php">logout</a>
    <marquee behavior="" direction="" scrollamount=5000 size>
        <p style = "font-size: 1000px;">BOMBACLAT</p>
    </marquee>
</body>
</html>