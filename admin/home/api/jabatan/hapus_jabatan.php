<?php
include '../koneksi.php';
$id = $_GET['id'];
$sql = mysqli_query($conn, "DELETE FROM jabatan_detail WHERE id_jabatan = '$id'");

if ($sql) {
    echo "<script> alert('Data berhasil dihapus!'); location.replace('../../data_jabatan_karyawan.php'); </script>";
}

else {
    echo "<script> alert('Data gagal dihapus!'); location.replace('../../data_jabatan_karyawan.php'); </script>";
}
?>