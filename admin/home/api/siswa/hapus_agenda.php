<?php
include '../../../api/conn.php';
$id = $_GET['id'];

$sql = mysqli_query($conn, "DELETE FROM agenda WHERE id_agenda = '" . $id . "'");

if ($sql) {
    echo "<script> alert('Data berhasil dihapus!'); location.replace('../../rekap_agenda.php'); </script>";
}

else {
    echo "<script> alert('Data gagal dihapus!'); location.replace('../../rekap_agenda.php'); </script>";
}
?>