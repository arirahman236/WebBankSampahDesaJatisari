<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'config.php';

// menangkap data yang dikirim dari form login
$no_telepon = $_POST['no_telepon'];
$password = $_POST['password'];

// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($db, "SELECT * FROM admin WHERE no_telepon='$no_telepon' AND password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password ditemukan pada database
if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);

    $nama = $data['nama'];
    $id_admin = $data['id_admin'];
    $_SESSION['nama'] = $nama; // Perbaikan disini, menggunakan $nama
    $_SESSION['id_admin'] = $id_admin;
    $_SESSION['no_telepon'] = $no_telepon;
    // alihkan ke halaman dashboard admin
    header("location: halaman_admin.php");
} else {
    header("location: login_admin.php?pesan=gagal");
}
?>
