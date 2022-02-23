<?php
include '../../../api/conn.php';
$id = $_GET['id'];
$sql = mysqli_query($conn, "DELETE FROM admin WHERE id_admin = '" . $id . "'");
if ($sql) {
    echo "<script> alert('Data berhasil dihapus!'); location.replace('../../data_admin.php'); </script>";
}
else {
    echo "<script> alert('Data gagal dihapus!'); location.replace('../../data_admin.php'); </script>";
}
?>