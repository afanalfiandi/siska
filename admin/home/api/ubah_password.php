<?php
include '../../api/conn.php';
session_start();

$nip = $_POST['nip'];
$pass_lama = md5($_POST['pass_lama']);
$pass_baru = md5($_POST['pass_baru']);
$data = mysqli_query($conn, "SELECT * from admin WHERE nip = '" . $nip . "'");
$row_pass = mysqli_fetch_array($data);

if (($pass_lama) == $row_pass['password']) {
    $sql = mysqli_query($conn, "UPDATE admin SET password = '$pass_baru' 
    WHERE nip = '" . $_SESSION['nip_admin'] . "'");
    echo "<script> alert('Password berhasil diubah!'); window.history.go(-2); </script>";
}

else {
    echo "<script> alert('Password lama tidak sesuai!'); window.history.back(); </script>";
}


?>