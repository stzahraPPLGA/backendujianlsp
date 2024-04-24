<?php
require_once "function.php";
session_start();
if (!$_SESSION["auth"]) {
    header("Location: login.php");
}
if (isset($_POST["logout"])) {
    logout();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
</head>
<body>
    <form method="post">
        <button type="submit" name="logout" id="logout">Logout</button>
    </form>
    <h2>Beranda</h2>
    <?php $i = 0;
    foreach($datapaket as $data){
        echo "Paket " .$data[0]."<br>";
        echo "Katagori " .$data[1]."<br>";
        echo "Harga " .$data[2]."<br>";
        echo "<a href='action.php?id=".$i++."'>Pilih</a><br>";
    }
    ?>
    
</body>
</html>