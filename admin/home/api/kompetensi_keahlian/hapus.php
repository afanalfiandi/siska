<?php
include '../../../api/conn.php';
$id = $_GET['id'];
$sql = mysqli_query($conn, "DELETE FROM jurusan_detail WHERE id_jurusan_detail = '$id'");
if ($sql) {
    echo "<script> alert('Data berhasil dihapus!'); location.replace('../../data_kompetensi_keahlian.php'); </script>";
}
else {
    echo "<script> alert('Data gagal dihapus!'); location.replace('../../data_kompetensi_keahlian.php'); </script>";
}
?>