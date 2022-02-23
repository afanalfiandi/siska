<?php 
    session_start();
    include '../../../api/conn.php';
    $nama_dokumen = $_POST['nama_dokumen'];
    $id_dok_detail = $_POST['id_dokumen_umum_detail'];
    $total_dok = mysqli_query($conn, "SELECT COUNT(*) as total_dok FROM dokumen_umum");
    $result_total_dok = mysqli_fetch_array($total_dok);
    $no = $result_total_dok['total_dok'] + 1;
    $kode_dokumen = date('dmY') . "-DU-" . $no;
	$fileTmpPath = $_FILES['file']['tmp_name'];
    $fileName = $_FILES['file']['name'];
    $fileSize = $_FILES['file']['size'];
    $fileType = $_FILES['file']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    $new_name = md5($fileName) . '.' . $fileExtension;
    $allowedfileExtensions = array('pdf', 'jpg', 'png', 'gif', 'txt', 'xls', 'xlsx', 'doc', 'docx', 'ppt', 'pptx', 'pptm','ppsx', 'dotx','xlsm');
    if (in_array($fileExtension, $allowedfileExtensions)) {        
        $uploadFileDir = '../../../../files/arsip/umum/';
        $dest_path = $uploadFileDir . $new_name;
        if ($fileSize < 5044070) {
            move_uploaded_file($fileTmpPath, $dest_path);            
            $sql = mysqli_query($conn, "INSERT INTO dokumen_umum(id_dokumen_umum_detail, files, nama_dokumen, tgl_upload) 
            VALUES ('$id_dok_detail', '$new_name', '$nama_dokumen', date(now()))");
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