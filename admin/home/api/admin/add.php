<?php
include '../../../api/conn.php';
include '../library/encryption/encrypt.php';
$nip = $_POST['nip'];
$nama = $_POST['nama'];
$pass = md5('123456');
 $sql = mysqli_query($conn, "INSERT INTO admin(nip, nama, password) 
 VALUES ('$nip', '$nama', '$pass')");
 if ($sql) {
     echo "<script> alert('Data berhasil ditambahkan!'); location.replace('../../data_admin.php'); </script>";
 }
 else {
     echo "<script> alert('Data gagal ditambahkan!'); location.replace('../../data_admin.php'); </script>";
 }


?>