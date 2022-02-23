<?php
include '../../../api/conn.php';
$nip = $_POST['nip'];
$nama = $_POST['nama'];
$sql = mysqli_query($conn, "UPDATE karyawan SET nama = '$nama' 
WHERE nip = '$nip'");

if ($sql) {
    echo "<script> alert('Data berhasil diubah'); location.replace('../../data_karyawan.php'); </script>";
}

else {
    echo "<script> alert('Data gagal diubah'); location.replace('../../data_karyawan.php'); </script>";
}
?>