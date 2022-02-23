<?php
include '../../../api/conn.php';
$jenis_dokumen = $_POST['jenis_dokumen'];
$id = $_POST['id'];
$sql = mysqli_query($conn, "UPDATE dokumen_wajib_detail SET jenis_dokumen = '$jenis_dokumen' WHERE id_dokumen_wajib_detail = '$id'");

if ($sql) {
    echo "<script> alert('Data berhasil diubah!'); location.replace('../../data_jenis_dokumen_wajib.php'); </script>";
}

else {
    echo "<script> alert('Data gagal diubah!'); location.replace('../../data_jenis_dokumen_wajib.php'); </script>";
}

?>