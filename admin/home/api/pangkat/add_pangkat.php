<?php
include '../koneksi.php';
$pangkat = $_POST['pangkat'];
$sql = mysqli_query($conn, "INSERT INTO pangkat_detail(pangkat) VALUES ('$pangkat')");

if ($sql) {
    echo "<script> alert('Data berhasil ditambahkan!'); location.replace('../../data_pangkat_guru.php'); </script>";
}

else {
    echo "<script> alert('Data gagal ditambahkan!'); location.replace('../../data_pangkat_guru.php'); </script>";
}

?>