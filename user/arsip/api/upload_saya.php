<?php
session_start();
include 'conn.php';
$nip = $_SESSION['nip'];
$nama_dokumen = $_POST['nama_dokumen'];

$fileTmpPath = $_FILES['file']['tmp_name'];
$fileName = $_FILES['file']['name'];
$fileSize = $_FILES['file']['size'];
$fileType = $_FILES['file']['type'];
$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));

$new_name = md5($fileName . $nip) . '.' . $fileExtension;

$uploadFileDir = '../../../files/arsip/saya/';
$dest_path = $uploadFileDir . $new_name;

if ($fileSize < 5044070) {
    move_uploaded_file($fileTmpPath, $dest_path);
    $sql = mysqli_query($conn, "INSERT INTO dokumen_saya(nip, nama_dokumen, files, tgl_upload) VALUES ('$nip', '$nama_dokumen','$new_name', date(now()))");
    if ($sql) {
        echo "<script> alert('File Berhasil Di Upload!'); window.history.back(); </script>";
    } else {
        echo "<script> alert('Kesalahan Terjadi!'); window.history.back(); </script>";
    }
} else {
    echo "<script> alert('Ukuran File Terlalu Besar!'); window.history.back(); </script>";
}
