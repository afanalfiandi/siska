<?php
session_start();
include 'koneksi.php';
    $sql = mysqli_query($conn, "UPDATE admin SET img = 'gambar.png' WHERE nip = '" . $_SESSION['nip'] . "'");
    if ($sql) {
        echo "<script> alert('Foto profil berhasil dihapus!'); window.history.back(); </script>";
    }
    else {
        echo "<script> alert('Foto profil gagal dihapus!'); </script>";
    }
?>