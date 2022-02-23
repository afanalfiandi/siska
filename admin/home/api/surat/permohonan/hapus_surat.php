<?php
include '../../../../api/conn.php';
$id = $_GET['id'];
$files = $_GET['files'];
$sql = mysqli_query($conn, "DELETE FROM surat WHERE id_surat = '$id'");
if ($sql) {
    unlink('../../../../../files/pkl/surat/permohonan/' . $files);
    echo "<script> alert('Data berhasil dihapus!'); location.replace('../../../rekap_surat_permohonan.php'); </script>";
} else {
    echo "<script> alert('Data gagal dihapus!'); location.replace('../../../rekap_surat_permohonan.php'); </script>";
}
