<?php
include '../koneksi.php';
$id = $_GET['id'];
$sql = mysqli_query($conn, "DELETE FROM pangkat_detail WHERE id_pangkat = '$id'");

if ($sql) {
    echo "<script> alert('Data berhasil dihapus!'); location.replace('../../data_pangkat_guru.php'); </script>";
}

else {
    echo "<script> alert('Data gagal dihapus!'); location.replace('../../data_pangkat_guru.php'); </script>";
}
?>