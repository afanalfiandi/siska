<?php
include '../../../api/conn.php';
$kompetensi_keahlian = $_POST['kompetensi_keahlian'];


$sql = mysqli_query($conn, "INSERT INTO jurusan_detail(jurusan) VALUES ('$kompetensi_keahlian')");

if ($sql) {
    echo "<script> alert('Data berhasil ditambahkan!'); location.replace('../../data_kompetensi_keahlian.php'); </script>";
}

else {
    echo "<script> alert('Data gagal ditambahkan!'); location.replace('../../data_kompetensi_keahlian.php'); </script>";
}
?>