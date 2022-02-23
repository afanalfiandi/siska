<?php
session_start();
include 'koneksi.php';

    $fileTmpPath = $_FILES['img']['tmp_name'];
    $fileName = $_FILES['img']['name'];
    $fileSize = $_FILES['img']['size'];
    $fileType = $_FILES['img']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    
    $new_name = md5($fileName) . '.' . $fileExtension;
    // $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc');
    $allowedfileExtensions = array('jpg', 'png', 'jpeg');
    if (in_array($fileExtension, $allowedfileExtensions)) {
        $uploadFileDir = '../assets/img/';
        $dest_path = $uploadFileDir . $new_name;
        
        if ($fileSize < 5044070) {
            move_uploaded_file($fileTmpPath, $dest_path);
            // $sql = mysqli_query($conn, "INSERT INTO dokumen(nip, id, file) VALUES ('" . $nip . "','" . $id_dokumen . "','" . $dest_path . "')");
            $sql = mysqli_query($conn,"UPDATE admin set img ='" . $new_name . "' WHERE nip='" . $_SESSION['nip'] . "'");
            if ($sql) {
               echo "<script> alert('File Berhasil Di Upload!'); window.history.back(); </script>";
            }
            else {
                echo "<script> alert('Kesalahan Terjadi!'); window.history.back(); </script>";
            }
        }
        else {
            echo "<script> alert('Ukuran File Terlalu Besar!'); window.history.back(); </script>";
        }
    } 

    else {
        echo "<script> alert('Ekstensi atau Format File Salah!'); window.history.back(); </script>";
    }


?>