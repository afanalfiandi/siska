<?php
include '../../../api/conn.php';
$id = $_GET['id'];
$sql = mysqli_query($conn, "DELETE FROM kelas_detail WHERE id_kelas_detail = '$id'");
if ($sql) {
    echo "<script> alert('Data berhasil dihapus!'); location.replace('../../data_kelas.php'); </script>";
}
else {
    echo "<script> alert('Data gagal dihapus!'); location.replace('../../data_kelas.php'); </script>";
}
?>