<?php
include("config.php");
$data = json_decode(file_get_contents('php://input'), true);

$id_setoran = $data['id_setoran'];
$tgl_setor = $data['tanggal_setor'];
$id_nasabah = $data['id_nasabah'];
$id_admin = $data['id_admin'];

// Check if data already exists in 'setoran' table
$check_query = "SELECT COUNT(*) as count FROM setoran WHERE id_setor = '$id_setoran'";
$result = mysqli_query($db, $check_query);
$row = mysqli_fetch_assoc($result);
$count = $row['count'];

if ($count > 0) {
    // Data already exists, perform update
    $sql = "UPDATE setoran SET tgl_setor = '$tgl_setor', id_nasabah = '$id_nasabah', id_admin = '$id_admin' WHERE id_setor = '$id_setoran'";
    mysqli_query($db, $sql);
} else {
    // Data does not exist, perform insert
    $sql = "INSERT INTO setoran (id_setor, tgl_setor, id_nasabah, id_admin) VALUE ('$id_setoran', '$tgl_setor', '$id_nasabah', '$id_admin')";
    mysqli_query($db, $sql);
}

// Insert or update 'detil_setor' table (assuming 'id_setor' is the primary key)
foreach ($data['data'] as $row) {
    $id_sampah = $row['sampah'];
    $total = $row['total'];
    $harga_nasabah = $row['harga_nasabah'];
    $harga_pengepul = $row['harga_pengepul'];

    // Check if data already exists in 'detil_setor' table
    $check_query = "SELECT COUNT(*) as count FROM detil_setor WHERE id_setor = '$id_setoran' AND id_sampah = '$id_sampah'";
    $result = mysqli_query($db, $check_query);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];

    if ($count > 0) {
        // Data already exists, perform update
        $sql2 = "UPDATE detil_setor SET total = '$total', harga_nasabah = '$harga_nasabah', harga_pengepul = '$harga_pengepul' WHERE id_setor = '$id_setoran' AND id_sampah = '$id_sampah'";
        mysqli_query($db, $sql2);
    } else {
        // Data does not exist, perform insert
        $sql2 = "INSERT INTO detil_setor (id_setor, id_sampah, total, harga_nasabah, harga_pengepul) VALUES ('$id_setoran', '$id_sampah', '$total', '$harga_nasabah', '$harga_pengepul')";
        mysqli_query($db, $sql2);
    }
}

// Update 'tabungan' table
$jumlah = 0;
foreach ($data['data'] as $row) {
    $jumlah += $row['harga_nasabah'];
}
$jml = $jumlah + $data['saldo'];
$sql3 = "INSERT INTO tabungan (id_nasabah, saldo) VALUES ('$id_nasabah', '$jml') ON DUPLICATE KEY UPDATE saldo = '$jml'";
mysqli_query($db, $sql3);

echo "Data Inserted or Updated";

?>