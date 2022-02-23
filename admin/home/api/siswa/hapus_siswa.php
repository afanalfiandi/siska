<?php
include '../../../api/conn.php';
$nis = $_GET['nis'];

$sql = mysqli_query($conn, "DELETE FROM siswa WHERE nis = '" . $nis . "'");

if ($sql) {
    echo "<script> alert('Data berhasil dihapus!'); location.replace('../../data_siswa.php'); </script>";
}

else {
    echo "<script> alert('Data gagal dihapus!'); location.replace('../../data_siswa.php'); </script>";
}
?>