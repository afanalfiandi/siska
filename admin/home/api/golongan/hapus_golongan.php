<?php
include '../koneksi.php';
$id = $_GET['id'];
$sql = mysqli_query($conn, "DELETE FROM golongan_detail WHERE id_golongan_detail = '$id'");
if ($sql) {
    echo "<script> alert('Data berhasil dihapus!'); location.replace('../../data_golongan.php'); </script>";
}
else {
    echo "<script> alert('Data gagal dihapus!'); location.replace('../../data_golongan.php'); </script>";
}
?>