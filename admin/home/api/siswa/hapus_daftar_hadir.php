<?php
include '../../../api/conn.php';
$id = $_GET['id'];

$sql = mysqli_query($conn, "DELETE FROM daftar_hadir WHERE id_daftar_hadir = '" . $id . "'");

if ($sql) {
    echo "<script> alert('Data berhasil dihapus!'); location.replace('../../rekap_daftar_hadir_pkl_siswa.php'); </script>";
}

else {
    echo "<script> alert('Data gagal dihapus!'); location.replace('../../rekap_daftar_hadir_pkl_siswa.php'); </script>";
}
?>