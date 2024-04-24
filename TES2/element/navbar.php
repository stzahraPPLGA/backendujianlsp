<?php
require_once "function.php";
if (isset($_POST["logout"])) {
    logout();
}
?>
<nav class="navbar my-4 px-3 text-white bg-primary rounded">
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#">Transaksi</a>
        </li>
    </ul>
    <ul class="nav justify-content-end">
        <li class="nav-item">
        <form method="post">
            <button type="submit" name="logout" id="logout" class="btn btn-danger">Logout</button>
        </form>
        </li>
    </ul>
</nav>