<?php
include '../api/conn.php';
$id = $_GET['id'];
$getFile = mysqli_query($conn, "SELECT * FROM format_bimbingan WHERE id_format_bimbingan = '$id'");
$fetchFile = mysqli_fetch_array($getFile);
$sql = mysqli_query($conn, "DELETE FROM format_bimbingan WHERE id_format_bimbingan = '$id'");
if ($sql) { 
    $file = '../../../../files/pkl/format_bimbingan/' . $fetchFile['files'];  
    unlink($file);
    ?>
    <script>
        alert('File Berhasil Dihapus!');
        location.replace('../format_bimbingan.php');
    </script>
<?php } else { ?>
    <script>
        alert('File Gagal Dihapus');
        window.history.back();
    </script>
<?php } ?>