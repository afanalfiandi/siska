<?php 
    session_start();
    include 'conn.php';
    $nip = $_SESSION['nip'];
    $id = $_POST['id'];
    $fileTmpPath = $_FILES['file']['tmp_name'];
    $fileName = $_FILES['file']['name'];
    $fileSize = $_FILES['file']['size'];
    $fileType = $_FILES['file']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    
    $new_name = md5($fileName . $nip) . '.' . $fileExtension;
    $allowedfileExtensions = array('pdf');
    if (in_array($fileExtension, $allowedfileExtensions)) {
        $uploadFileDir = '../../../files/arsip/wajib/';
        $dest_path = $uploadFileDir . $new_name;
        
        if ($fileSize < 5044070) {
            move_uploaded_file($fileTmpPath, $dest_path);
            $sql = mysqli_query($conn, "UPDATE dokumen_wajib
            SET nip = '$nip',
            files = '$new_name',
            tgl_upload = date(now())
            WHERE id_dokumen = '$id'
            ");
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