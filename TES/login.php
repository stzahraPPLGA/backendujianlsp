<?php
require "function.php";
session_start();

if (isset($_SESSION["auth"])){
    header("Location: home.php");
}
if (isset($_POST["submit"])){
    login();
}
if (isset($_POST["register"])){
    echo "sudah ada akun";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Selamat datang di Laundry SMKN 2 BJM</h2><br>
    <form method="post">
        <input type="text" name="username" id="username" placeholder="Username">
        <input type="password" name="password" id="password" placeholder="Password">
        <button type="submit" name="register" id="register">Register</button>
        <button type="submit" name="submit" id="submit">Login</button>
    </form>
</body>
</html>