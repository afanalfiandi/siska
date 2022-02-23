<?php
include '../../../api/conn.php';
$id = $_GET['id'];
$sql = mysqli_query($conn, "DELETE FROM berita WHERE id_berita = '$id'");
if ($sql) {
    echo "<script> alert('Data berhasil dihapus!'); location.replace('../../berita_acara.php'); </script>";
}
else {
    echo "<script> alert('Data gagal dihapus!'); location.replace('../../berita_acara.php'); </script>";
}
?>