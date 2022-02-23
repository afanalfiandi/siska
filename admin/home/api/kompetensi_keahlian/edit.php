<?php
include '../../../api/conn.php';
$id = $_POST['id_kompetensi_keahlian_detail'];
$kompetensi_keahlian = $_POST['kompetensi_keahlian'];
$sql = mysqli_query($conn, "UPDATE jurusan_detail SET jurusan = '$kompetensi_keahlian' WHERE id_jurusan_detail = '$id'");

if ($sql) {
    echo "<script> alert('Data berhasil diubah'); location.replace('../../data_kompetensi_keahlian.php'); </script>";
}

else {
    echo "<script> alert('Data gagal diubah'); location.replace('../../data_kompetensi_keahlian.php'); </script>";
}
?>