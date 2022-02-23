<?php
include '../../api/conn.php';
session_start();
$user = $_POST['user'];
$pass = md5($_POST['pass']);

$sql = mysqli_query($conn, "SELECT * FROM admin 
WHERE nip = '$user' && password = '$pass'");
$row = mysqli_fetch_array($sql);

if ($row > 0) {
    session_start();
    $_SESSION['nip'] = $user;
    $_SESSION['nama'] = $row['nama'];
    header('location:../dashboard.php');
} else {
    echo "<script> alert('Username atau Kata Sandi Salah'); window.history.back(); </script>";
}
