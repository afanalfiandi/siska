<?php 
    include '../../../api/conn.php';
    $hal = $_GET['halaman'];
    $id = $_GET['id'];
    $sql = mysqli_query($conn, "DELETE FROM dokumen_umum WHERE id_dokumen ='" . $id . "'");
    if ($sql) {
       echo "<script> alert('File berhasil dihapus'); location.replace('../../admin_dokumen_umum.php?halaman=".$hal."');</script>";
    }
    else {
        echo "<script> alert('File gagal dihapus'); location.replace('../../admin_dokumen_umum.php?halaman=".$hal."');</script>";
    }
?>