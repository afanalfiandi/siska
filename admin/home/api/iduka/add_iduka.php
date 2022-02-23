<?php
include '../../../api/conn.php';
$iduka = $_POST['iduka'];
$alamat = $_POST['alamat'];
$pass = md5('123');
$sqluser = mysqli_query($conn, "SELECT * FROM iduka ORDER BY user DESC");
$rowuser = mysqli_fetch_array($sqluser);
$user = $rowuser['user'] + 1;


$sql = mysqli_query($conn, "INSERT INTO iduka(user, iduka, alamat, pass, img) 
VALUES ('$user', '$iduka', '$alamat','$pass', 'default.png')");

if ($sql) {
    echo "<script> alert('Data berhasil ditambahkan!'); location.replace('../../data_iduka.php'); </script>";
}

else {
    echo "<script> alert('Data gagal ditambahkan!'); location.replace('../../data_iduka.php'); </script>";
}
?>