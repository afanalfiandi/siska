<?php
include '../../../api/conn.php';
$id = $_GET['id'];
$sql = mysqli_query($conn, "DELETE FROM format_bimbingan WHERE id_format_bimbingan = '$id'");
if ($sql) {
    echo "<script> alert('Data berhasil dihapus!'); location.replace('../../rekap_format_bimbingan.php'); </script>";
}

else {
    echo "<script> alert('Data gagal dihapus!'); location.replace('../../rekap_format_bimbingan.php'); </script>";
}

?>