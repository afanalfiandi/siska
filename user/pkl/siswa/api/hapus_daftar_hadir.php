<?php
include '../api/conn.php';
$id = $_GET['id'];
$getFile = mysqli_query($conn, "SELECT * FROM daftar_hadir WHERE id_daftar_hadir = '$id'");
$fetchFile = mysqli_fetch_array($getFile);
$sql = mysqli_query($conn, "DELETE FROM daftar_hadir WHERE id_daftar_hadir = '$id'");
if ($sql) { 
    $file = '../../../../files/pkl/daftar_hadir/' . $fetchFile['files'];  
    unlink($file);
    ?>
    <script>
        alert('File Berhasil Dihapus!');
        location.replace('../daftar_hadir.php');
    </script>
<?php } else { ?>
    <script>
        alert('File Gagal Dihapus');
        window.history.back();
    </script>
<?php } ?>