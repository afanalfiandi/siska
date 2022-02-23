<?php
include '../../../api/conn.php';

$id = $_GET['id'];
$sql = mysqli_query($conn, "DELETE FROM dokumen_wajib_detail WHERE id_dokumen_wajib_detail = '$id'");

if ($sql) {
    $deleteFK = mysqli_query($conn, "ALTER TABLE dokumen_wajib DROP FOREIGN KEY id_dok_wajib");
    $createFK = mysqli_query($conn, "ALTER TABLE dokumen_wajib  ADD CONSTRAINT id_dok_wajib FOREIGN KEY (id_dokumen_wajib_detail) REFERENCES dokumen_wajib_detail(id_dokumen_wajib_detail)");
   
    $deleteField = mysqli_query($conn, "ALTER TABLE dokumen_wajib_detail DROP id_dokumen_wajib_detail");
    $createField = mysqli_query($conn, "ALTER TABLE dokumen_wajib_detail ADD id_dokumen_wajib_detail INT NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST"); 
    echo "<script> alert('Data berhasil dihapus!'); location.replace('../../data_jenis_dokumen_wajib.php'); </script>";
}

else {
    echo "<script> alert('Data gagal dihapus!'); location.replace('../../data_jenis_dokumen_wajib.php'); </script>";
}
?>