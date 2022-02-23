<?php
include '../../../api/conn.php';
$id_tujuan = $_POST['tujuan_berita'];
$isi_berita = $_POST['isi_berita'];
$tgl_terbit = $_POST['tgl_terbit'];
$id = $_POST['id'];
$sql = mysqli_query($conn, "UPDATE berita SET isi = '$isi_berita', tgl_terbit = '$tgl_terbit', id_berita_detail = '$id_tujuan' WHERE id_berita = '$id'");
if ($sql) {
    echo "<script> alert('Data berhasil diubah!'); location.replace('../../berita_acara.php'); </script>";
} else {
    echo "<script> alert('Data gagal diubah!'); location.replace('../../berita_acara.php'); </script>";
}
