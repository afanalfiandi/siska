<?php
include '../../../api/conn.php';
include '../library/encryption/encrypt.php';
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$kompetensi_keahlian = $_POST['kompetensi_keahlian'];
$kelas = $_POST['kelas'];
$pass = md5('123456');
$nip_pembimbing = $_POST['nip_pembimbing'];
$id_iduka = $_POST['iduka'];

$sql = mysqli_query($conn, "INSERT INTO siswa(nis,nama, id_jurusan_detail, id_kelas_detail, password, img, nip_pembimbing, id_iduka)
VALUES ('$nis', '$nama', '$kompetensi_keahlian', '$kelas', '$pass', 'default.png', '$nip_pembimbing', '$id_iduka')");
 if ($sql) {
     echo "<script> alert('Data berhasil ditambahkan!'); location.replace('../../data_siswa.php'); </script>";
 }
 else {
    echo "<script> alert('Data gagal ditambahkan!'); location.replace('../../data_siswa.php'); </script>";
 }
?>