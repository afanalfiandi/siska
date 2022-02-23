<?php
include '../../../api/conn.php';
$jenis_dokumen = $_POST['jenis_dokumen'];
$max = mysqli_query($conn , "SELECT max(id_dokumen_wajib_detail) as max FROM dokumen_wajib_detail");
$maxResult = mysqli_fetch_array($max);
$maxValue = $maxResult['max'] + 1;
$sql = mysqli_query($conn, "INSERT INTO dokumen_wajib_detail(id_dokumen_wajib_detail, jenis_dokumen) VALUES ('$maxValue', '$jenis_dokumen')");
if ($sql) {
    echo "<script> alert('Data berhasil ditambahkan!'); location.replace('../../data_jenis_dokumen_wajib.php'); </script>";
}

else {
    echo "<script> alert('Data gagal ditambahkan!'); location.replace('../../data_jenis_dokumen_wajib.php'); </script>";
}
?>