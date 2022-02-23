<?php
include '../../../api/conn.php';
$nip = $_POST['nip'];
$nama = $_POST['nama'];
$kompetensi_keahlian = $_POST['kompetensi_keahlian'];

$sql = mysqli_query($conn, "UPDATE guru SET nama = '$nama', 
id_jurusan_detail = '$kompetensi_keahlian'
WHERE nip = '$nip'");

if ($sql) {
    echo "<script> alert('Data berhasil diubah'); location.replace('../../data_pegawai.php'); </script>";
}

else {
    echo "<script> alert('Data gagal diubah'); location.replace('../../data_pegawai.php'); </script>";
}
?>