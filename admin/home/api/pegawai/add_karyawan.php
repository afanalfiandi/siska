<?php
include '../../../api/conn.php';
include '../library/encryption/encrypt.php';
$pass = md5('123456');
$nip = $_POST['nip'];
$nama = $_POST['nama'];
$sql = mysqli_query($conn, "INSERT INTO karyawan(nip, nama, password, img) 
VALUES ('$nip','$nama', '$pass','default.png')");

 if ($sql) {
     echo "<script> alert('Data berhasil ditambahkan!'); location.replace('../../data_karyawan.php'); </script>";
 }

 else {
     echo "<script> alert('Data gagal ditambahkan!'); location.replace('../../data_karyawan.php'); </script>";
 }

?>