<?php
include '../koneksi.php';
$id = $_POST['id'];
$nama_jabatan = $_POST['nama_jabatan'];
$sql = mysqli_query($conn, "UPDATE jabatan_detail SET nama_jabatan = '$nama_jabatan' WHERE id_jabatan = '$id'");

if ($sql) {
    echo "<script> alert('Data berhasil diubah!'); location.replace('../../data_jabatan_karyawan.php'); </script>";
}

else {
    echo "<script> alert('Data gagal diubah!'); location.replace('../../data_jabatan_karyawan.php'); </script>";
}
?>