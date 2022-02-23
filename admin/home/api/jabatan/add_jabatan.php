<?php
include '../koneksi.php';
$nama_jabatan = $_POST['nama_jabatan'];
$sql = mysqli_query($conn, "INSERT INTO jabatan_detail(nama_jabatan) VALUES ('$nama_jabatan')");

if ($sql) {
    echo "<script> alert('Data berhasil ditambahkan!'); location.replace('../../data_jabatan_karyawan.php'); </script>";
}

else {
    echo "<script> alert('Data gagal ditambahkan!'); location.replace('../../data_jabatan_karyawan.php'); </script>";
}

?>