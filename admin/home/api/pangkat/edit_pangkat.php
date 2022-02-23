<?php
include '../koneksi.php';
$id = $_POST['id'];
$pangkat = $_POST['pangkat'];
$sql = mysqli_query($conn, "UPDATE pangkat_detail SET pangkat = '$pangkat' WHERE id_pangkat = '$id'");

if ($sql) {
    echo "<script> alert('Data berhasil diubah!'); location.replace('../../data_pangkat_guru.php'); </script>";
}

else {
    echo "<script> alert('Data gagal diubah!'); location.replace('../../data_pangkat_guru.php'); </script>";
}
?>