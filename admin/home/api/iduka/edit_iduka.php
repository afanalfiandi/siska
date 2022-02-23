<?php
include '../../../api/conn.php';
$id = $_POST['id'];
$iduka = $_POST['iduka'];
$alamat = $_POST['alamat'];
$sql = mysqli_query($conn, "UPDATE iduka SET iduka = '$iduka', alamat = '$alamat'
WHERE id_iduka = '$id'");

if ($sql) {
    echo "<script> alert('Data berhasil diubah'); location.replace('../../data_iduka.php'); </script>";
} else {
    echo "<script> alert('Data gagal diubah'); location.replace('../../data_iduka.php'); </script>";
}
