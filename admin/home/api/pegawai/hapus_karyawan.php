<?php
include '../../../api/conn.php';
$nip = $_GET['nip'];

$sql = mysqli_query($conn, "DELETE FROM karyawan WHERE nip = '" . $nip . "'");

if ($sql) {
    echo "<script> alert('Data berhasil dihapus!'); location.replace('../../data_karyawan.php'); </script>";
}

else {
    echo "<script> alert('Data gagal dihapus!'); location.replace('../../data_karyawan.php'); </script>";
}
?>