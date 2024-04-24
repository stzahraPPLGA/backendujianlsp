<?php
require_once "function.php";
session_start();
if (!$_SESSION["auth"]) {
    header("Location: login.php");
}

$id = $_GET["id"];
$data = $datapaket[$id];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Transaksi</title>
</head>
<body class="container">
<?php require_once "element/navbar.php"?>
    <div class="card border-primary p-4 mb-4">
        <div class="row">
            <div class="col">
                <label  for="Nomor" class="form-label">No Transaksi</label>
                <input class="form-control mb-2" type="text" name="Nomor" id="Nomor">
                <label  for="Tanggal" class="form-label">Tanggal Transaksi</label>
                <input class="form-control mb-2" type="date" name="Tanggal" id="Tanggal">
                <label  for="Nama" class="form-label">Nama Customer</label>
                <input class="form-control mb-2" type="text" name="Nama" id="Nama">
                <label  for="paket" class="form-label">Pilihan Paket</label>
                <input class="form-control mb-2" type="text" name="paket" id="paket" value="<?= $data[0] ?>" disabled>
                <label  for="harga" class="form-label">Harga Paket</label>
                <input class="form-control" type="text" name="harga" id="harga" value="<?= $data[2] ?>" disabled>
            </div>
            <div class="col">
                <div class="row d-grid m-4">
                    <div class="col">
                        <input class="form-check-input" type="radio" name="pilih" value="0" id="tidak">
                        <label class="form-check-label" for="tidak">Tidak ada tambahan - Rp. 0</label>
                    </div>
                    <div class="col mt-4">
                        <input class="form-check-input" type="radio" name="pilih" value="10000" id="pelembut">
                        <label class="form-check-label" for="pelembut">Pelembut - Rp. 10.000</label>
                    </div>
                    <div class="col mt-4">
                        <button class="btn btn-primary" type="submit" name="hitungTotal" id="hitungTotal">Hitung Total</button><br>
                    </div>
                </div>   
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <label class="form-check-label mb-2" for="total">Total Harga</label>
            <input class="form-control" type="text" id="total" disabled>
            
            <label class="form-check-label my-2" for="bayar">Pembayaran</label>
            <input class="form-control" type="text" id="bayar">
            <div class="d-grid justify-content-end my-3">
                <button class="btn btn-primary" type="submit" id="hitungKembalian">Hitung Kembalian</button>
            </div>
        </div>
        <div class="col">
            <label class="form-check-label mb-2" for="kembalian">Kembalian</label>
            <input class="form-control" type="text" id="kembalian" disabled>
            <div class="d-grid justify-content-end my-3">
                <button type="button" class="btn btn-primary" id="simpanbtn">Simpan Transaksi</button>
            </div>
                <div class="mt-3" id="simpan"></div>
            </div>
        </div>
    </div>

    <script>
        const totalbtn = document.getElementById("hitungTotal");
        const total = document.getElementById("total");
        const harga = document.getElementById("harga");
        const pelembut = document.getElementById("pelembut");
        const bayar = document.getElementById("bayar");
        const kembalianbtn = document.getElementById("hitungKembalian");
        const kembalian = document.getElementById("kembalian");
        const kembali = document.getElementById("kembali");
        
        const simpan = document.getElementById('simpan');
        const appendAlert = (message, type) => {
        const wrapper = document.createElement('div')
        wrapper.innerHTML = [
            `<div class="alert alert-${type} alert-dismissible d-flex justify-content-between" role="alert">`,
            `   <div>${message}</div>`,
            '   <a href="home.php" class="btn btn-outline-success">Oke</a>',
            '</div>'
        ].join('')

        simpan.append(wrapper)
        }

        const alertTrigger = document.getElementById('simpanbtn')
        if (alertTrigger) {
        alertTrigger.addEventListener('click', () => {
            appendAlert('Transaksi berhasil!', 'success')
        })
        };
              
        let transaksi;
        totalbtn.addEventListener("mousedown", () => {
            if(pelembut.checked) {
                transaksi = parseInt(harga.value) + parseInt(pelembut.value);
            } else {
                transaksi = parseInt(harga.value);
            }
            total.value = transaksi;
            return transaksi;
        });

        kembalianbtn.addEventListener("mousedown", () => {
            kembalian.value = parseInt(bayar.value) - parseInt(transaksi);
        });

        kembali.addEventListener("click", () => {
            // Mengarahkan pengguna ke halaman home.php
            window.location.href = "home.php";
        });

        

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <?php require_once "element/footer.php"?>
</body>
</html>