<?php
include '../../../api/conn.php';
$kelas = $_POST['kelas'];
$sql = mysqli_query($conn, "INSERT INTO kelas_detail(kelas) VALUES ('$kelas')");

if ($sql) {
    echo "<script> alert('Data berhasil ditambahkan!'); location.replace('../../data_kelas.php'); </script>";
}
else {
    echo "<script> alert('Data gagal ditambahkan!'); location.replace('../../data_kelas.php'); </script>";
}
?>