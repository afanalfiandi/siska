<?php
include '../../../api/conn.php';
$id = $_GET['id'];
$sql = mysqli_query($conn, "DELETE FROM data_monitoring WHERE id_data_monitoring = '$id'");
if ($sql) {
    echo "<script> alert('Data berhasil dihapus!'); location.replace('../../rekap_data_monitoring.php'); </script>";
} else {
    echo "<script> alert('Data gagal dihapus!'); location.replace('../../rekap_data_monitoring.php'); </script>";
}
