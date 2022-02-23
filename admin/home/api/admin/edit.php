<?php
include '../koneksi.php';
$id = $_POST['id'];
$nip = $_POST['nip'];
$nama = $_POST['nama'];
$sql = mysqli_query($conn, "UPDATE admin SET nip = '" . $nip . "', nama = '" . $nama . "'  WHERE id= '" . $id . "'");
if ($sql) {
    echo "<script> alert('Data berhasil diubah'); location.replace('../../data_admin.php'); </script>";
}
else {
    echo "<script> alert('Data gagal diubah'); location.replace('../../data_admin.php'); </script>";
}
?>