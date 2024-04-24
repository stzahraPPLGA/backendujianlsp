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
    echo "<div class='alert alert-danger text-center'>Sudah memiliki username dan password</div>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login</title>
</head>
<body class="container">
    <div class="row d-flex justify-content-center">
        <h2 class="text-center my-5 fw-bold">SELAMAT DATANG DI LAUNDRY <br> SMKN 2 BANJARMASIN</h2>
        <div class="card align-items-center py-5 shadow border-black rounded"" style="width: 25rem">
            <img src="image/logo.png" class="img-fluid mb-3" style="width: 130px;">
            <form method="post">
                <div class="row my-3">
                    <div class="col">
                        <input class="form-control mb-3" type="text" name="username" id="username" placeholder="Username">
                        <input class="form-control" aria-describedby="passwordHelpBlock" type="password" name="password" id="password" placeholder="Password">
                    </div>
                </div>
                <div class="row">
                    <div class="col d-grid">
                        <button class="btn btn-primary" type="submit" name="register" id="register">Register</button>
                    </div>
                    <div class="col d-grid">
                        <button class="btn btn-primary" type="submit" name="submit" id="submit">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>