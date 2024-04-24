<?php
// login function
function login() {
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST["username"];
        $password = $_POST["password"];

        if ($username == "userlsp" && $password == "smkn2bjm") {
            $auth = $_SESSION["auth"] = "$username";
            setcookie("auth", $auth);
            header("Location: home.php");
            exit();
        } else {
            echo "<div class='alert alert-danger text-center'>Username dan Password salah</div>";
        }
    }
}

// logout function
function logout() {
    session_start();
    setcookie("auth", "", 100);
    session_unset();
    session_destroy();

    header("Location: login.php");
    exit();
}

// array data paket
$datapaket = array (
    array("Paket A", "Cuci kering biasa", 40000),
    array("Paket B", "Cuci kering dan lipat", 45000),
    array("Paket C", "Cuci kering, setrika, dan lipat", 50000),
    array("Paket D", "Cuci kering, setrika, pengharum,lipat", 55000)
   );

?>