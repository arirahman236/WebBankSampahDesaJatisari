<?php

include("config.php");

// Cek apakah tombol Input sudah diklik atau belum
if(isset($_POST['Input'])){

    // Ambil data dari formulir
    $alamat = $_POST['alamat'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $no_telepon = $_POST['no_telepon'];

    // Mendapatkan ID terakhir dari database
    $connect = new PDO("mysql:host=localhost; dbname=ublmobil_bank_sampah", "root", "");
    $query = "SELECT MAX(id_admin) as max_id FROM admin";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetch();
    $lastId = $result['max_id'];

    // Mengambil angka dari ID terakhir
    $lastNumber = substr($lastId, 1);

    // Menambahkan 1 ke angka ID terakhir
    $newNumber = intval($lastNumber) + 1;

    // Menghasilkan ID dengan format aXXX (misal: a001)
    $newId = 'a' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

    // Buat query
    $sql = "INSERT INTO admin (id_admin, alamat, password, nama, no_telepon) VALUES ('$newId', '$alamat', '$password', '$nama', '$no_telepon')";
    $query = mysqli_query($db, $sql);

    // Apakah query simpan berhasil?
    if($query) {
        // Jika berhasil, alihkan ke halaman tabel_admin.php dengan status=sukses
        header('Location: tabel_admin.php?status=sukses');
    } else {
        // Jika gagal, alihkan ke halaman tabel_admin.php dengan status=gagal
        header('Location: tabel_admin.php?status=gagal');
    }
} else {
    die("Akses dilarang...");
}

?>
