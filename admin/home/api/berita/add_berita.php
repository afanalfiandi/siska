<?php
include '../../../api/conn.php';
$id =$_POST['tujuan_berita'];
$isi_berita = $_POST['isi_berita'];
$tgl_terbit = $_POST['tgl_terbit'];
$sql = mysqli_query($conn, "INSERT INTO berita(isi, tgl_terbit, id_berita_detail) 
VALUES('$isi_berita', '$tgl_terbit', '$id')");
if ($sql) {
    echo "<script> alert('Data berhasil ditambahkan!'); location.replace('../../berita_acara.php'); </script>";
}
else {
    echo "<script> alert('Data berhasil ditambahkan!'); location.replace('../../berita_acara.php'); </script>";
}
?>