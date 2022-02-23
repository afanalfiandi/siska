<?php
include '../koneksi.php';
$id = $_POST['id'];
$golongan = $_POST['golongan'];
$sql = mysqli_query($conn, "UPDATE golongan_detail SET golongan = '$golongan' WHERE id_golongan_detail = '$id'");
if ($sql) {
    echo "<script> alert('Data berhasil diubah!'); location.replace('../../data_golongan.php'); </script>";
}
else {
    echo "<script> alert('Data gagal diubah!'); location.replace('../../data_golongan.php'); </script>";
}
?>