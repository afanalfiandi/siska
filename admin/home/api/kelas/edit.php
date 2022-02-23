<?php
include '../../../api/conn.php';
$id = $_POST['id_kelas'];
$kelas = $_POST['kelas'];
$sql = mysqli_query($conn, "UPDATE kelas_detail SET kelas = '$kelas' WHERE id_kelas_detail = '$id'");
if ($sql) {
    echo "<script> alert('Data berhasil diubah'); location.replace('../../data_kelas.php'); </script>";
}
else {
    echo "<script> alert('Data gagal diubah'); location.replace('../../data_kelas.php'); </script>";
}
?>