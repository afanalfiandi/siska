<?php
include '../../../api/conn.php'; 
$files = $_GET['files'];
$id = $_GET['id'];
$sql = mysqli_query($conn, "DELETE FROM surat WHERE id_surat = '$id'");
if ($sql) {
    unlink('../../../../files/pkl/surat/tugas/' . $files);
    echo "<script> alert('Data berhasil dihapus!'); window.history.back(); </script>";
}

else {
    echo "<script> alert('Data gagal dihapus!'); window.history.back(); </script>";
}
