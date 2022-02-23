<?php
include '../../../api/conn.php';
$id = $_GET['id'];
$sql = mysqli_query($conn, "DELETE FROM sertifikat WHERE id_sertifikat = '$id'");
if ($sql) {
    echo "<script> alert('Sertifikat berhasil dihapus!'); location.replace('../../rekap_sertifikat.php'); </script>";
}
?>