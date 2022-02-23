<?php
include '../../../api/conn.php';
include '../library/encryption/encrypt.php';
$pass = md5('123456');

$nip = $_POST['nip'];
$nama = $_POST['nama'];
$kompetensi_keahlian = $_POST['kompetensi_keahlian'];
$sql = mysqli_query($conn, "INSERT INTO guru(nip, nama, id_jurusan_detail, password, img) 
VALUES ('$nip', '$nama', '$kompetensi_keahlian', '$pass', 'default.png')");

if ($sql) {
    echo "<script> alert('Data berhasil ditambahkan!'); location.replace('../../data_pegawai.php'); </script>";
}

else {
    echo "<script> alert('Data gagal ditambahkan!'); location.replace('../../data_pegawai.php'); </script>";
}
?>