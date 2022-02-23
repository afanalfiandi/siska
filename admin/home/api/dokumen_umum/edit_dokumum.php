<?php
include '../../../api/conn.php';
session_start();
$id_dok = $_POST['id'];
$hal = $_POST['halaman'];
$fileTmpPath = $_FILES['file']['tmp_name'];
$fileName = $_FILES['file']['name'];
$fileSize = $_FILES['file']['size'];
$fileType = $_FILES['file']['type'];
$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));
$new_name = md5($fileName) . '.' . $fileExtension;
$allowedfileExtensions = array('pdf', 'jpg', 'png', 'gif', 'txt', 'xls', 'xlsx', 'doc', 'docx', 'ppt', 'pptx', 'pptm', 'ppsx', 'dotx', 'xlsm');
if (in_array($fileExtension, $allowedfileExtensions)) {
    $uploadFileDir = '../../../../files/arsip/umum/';
    $dest_path = $uploadFileDir . $new_name;
    if ($fileSize < 5044070) {
        move_uploaded_file($fileTmpPath, $dest_path);
        $sql = mysqli_query($conn, "UPDATE dokumen_umum SET files = '$new_name' WHERE id_dokumen ='$id_dok'");
        if ($sql) {
            echo "<script> alert('File Berhasil Di Ubah!'); location.replace('../../lihat_file_umum.php?halaman=$hal&&id=$id_dok'); </script>";
        } else {
            echo "<script> alert('Kesalahan Terjadi!'); window.history.back(); </script>";
        }
    } else {
        echo "<script> alert('Ukuran File Terlalu Besar!'); window.history.back(); </script>";
    }
} else {
    echo "<script> alert('Ekstensi atau Format File Salah!'); window.history.back(); </script>";
}
