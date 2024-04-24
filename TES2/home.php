<?php
require_once "function.php";
session_start();
if (!$_SESSION["auth"]) {
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Beranda</title>
</head>
<body class="container">
    <?php require_once "element/navbar.php"; ?>
    <div class="text-center my-4">
        <img src="image/laundryimage.jpg" class="img-thumbnail" style="width: 1000px;">
    </div>
    <h2 class="my-4">Daftar Paket Laundy</h2>
        <?php $i = 0 ?>
        <div class="row row-cols-2 g-4 d-flex justify-content-center">
        <?php foreach($datapaket as $data) :?>
            <div class="col">
                <div class="card border-warning">
                    <div class="card-body my-2">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title"><?= $data[0]; ?></h5>
                            <h5>Rp. <?= $data[2] ?></h5>
                        </div>
                        <div class="d-grid">
                            <p class="card-text"><?= $data[1]; ?></p>
                            <a href="action.php?id=<?= $i++; ?>" class="btn btn-primary">Pilih</a><br>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
        </div>

    <?php require_once "element/footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>