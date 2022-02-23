<?php
session_start();
include '../api/conn.php';
$nis = $_POST['nis'];

$fileTmpPath = $_FILES['img']['tmp_name'];
$fileName = $_FILES['img']['name'];
$fileSize = $_FILES['img']['size'];
$fileType = $_FILES['img']['type'];
$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));


$new_name = md5($fileName . $nis) . '.' . $fileExtension;
$allowedfileExtensions = array('jpg', 'png', 'jpeg');

if (in_array($fileExtension, $allowedfileExtensions)) {
    $uploadFileDir = '../../../../files/img/profil/';
    $dest_path = $uploadFileDir . $new_name;

    if ($fileSize < 5044070) {
        move_uploaded_file($fileTmpPath, $dest_path);
        $sql = mysqli_query($conn, "UPDATE siswa set 
         img ='$new_name'         
          WHERE nis ='$nis'");
        if ($sql) {
            $_SESSION['img'] = $new_name;
            echo "<script> alert('Foto Berhasil Diubah!'); window.history.back(); </script>";
        } else {
            echo "<script> alert('Kesalahan Terjadi!'); window.history.back(); </script>";
        }
    } else {
        echo "<script> alert('Ukuran File Terlalu Besar!'); window.history.back(); </script>";
    }
} else {
    echo "<script> alert('Ekstensi atau Format File Salah!'); //window.history.back(); </script>";
}
