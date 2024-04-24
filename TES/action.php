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
    <title>Transaksi</title>
</head>
<body>
    <h2>Transaksi</h2>
    <input type="radio" name="pilih" value="0" id="tidak">Tidak ada tambahan - Rp. 0
    <input type="radio" name="pilih" value="10000" id="pelembut">Pelembut - Rp. 10.000
    <br>
    No Transaksi
    <input type="text" name="Nomor" id="Nomor"><br>
    Tanggal Transaksi
    <input type="date" name="Tanggal" id="Tanggal"><br>
    Nama Customer
    <input type="text" name="Nama" id="Nama"><br>
    Pilihan Paket
    <input type="text" name="paket" id="paket" value="<?= $data[0] ?>" disabled><br>
    Harga Paket
    <input type="text" name="harga" id="harga" value="<?= $data[2] ?>" disabled><br>

    
    <button type="submit" name="hitungTotal" id="hitungTotal">Hitung Total</button><br>
    Total Harga
    <input type="text" id="total" disabled><br>
    Pembayaran
    <input type="text" id="bayar"><br>
    <button type="submit" id="hitungKembalian">Hitung Kembalian</button><br>
    Kembalian
    <input type="text" id="kembalian" disabled><br>
    <button type="submit" id="simpan">Simpan Transaksi</button>
    <button id="oke" disabled>Oke</button>
    <button type="submit" id="kembali">Kembali</button>

    <script>
        const totalbtn = document.getElementById("hitungTotal");
        const total = document.getElementById("total");
        const harga = document.getElementById("harga");
        const pelembut = document.getElementById("pelembut");
        const bayar = document.getElementById("bayar");
        const kembalianbtn = document.getElementById("hitungKembalian");
        const kembalian = document.getElementById("kembalian");
        const simpan = document.getElementById("simpan");
        const okebtn = document.getElementById("oke");
        const kembali = document.getElementById("kembali");

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

    simpan.addEventListener("click", () => {
        okebtn.disabled = false;
        });

        // Tambahkan event listener untuk tombol "Oke"
        okebtn.addEventListener("click", () => {
            // Arahkan kembali ke halaman "home.php"
            window.location.href = "home.php";
        });
        // alert('Data Berhasil Disimpan'); //jika tombol dipencet maka akan mengelurakan pop up ini
        //     window.location.href = "home.php"; //lalu user akan dikembalikan ke halaman admin
        // });
    
    
    kembali.addEventListener("click", () => {
        // Mengarahkan pengguna ke halaman home.php
        window.location.href = "home.php";
    });
    </script>
</body>
</html>