<?php
include '../koneksi.php';
$golongan = $_POST['golongan'];
$sql = mysqli_query($conn, "INSERT INTO golongan_detail(golongan) VALUES ('$golongan')");

if ($sql) {
    echo "<script> alert('Data berhasil ditambahkan!'); location.replace('../../data_golongan.php'); </script>";
}
else {
    echo "<script> alert('Data gagal ditambahkan!'); location.replace('../../data_golongan.php'); </script>";
}

?>