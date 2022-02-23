<?php
include '../../../api/conn.php';
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$kompetensi_keahlian = $_POST['kompetensi_keahlian'];
$kelas = $_POST['kelas'];
$nip_pembimbing = $_POST['nip_pembimbing'];
$id_iduka = $_POST['iduka'];

$sql = mysqli_query($conn, "UPDATE siswa SET nama = '$nama' , 
id_jurusan_detail = '$kompetensi_keahlian', id_kelas_detail  = '$kelas', nip_pembimbing = '$nip_pembimbing',
id_iduka = '$id_iduka'
WHERE nis = '$nis'");
if ($sql) {
    echo "<script> alert('Data berhasil diubah'); location.replace('../../data_siswa.php'); </script>";
}
else {
    echo "<script> alert('Data gagal diubah'); //location.replace('../../data_siswa.php'); </script>";
}
?>