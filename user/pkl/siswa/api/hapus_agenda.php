<?php
include '../api/conn.php';
$id = $_GET['id'];
$getFile = mysqli_query($conn, "SELECT * FROM agenda WHERE id_agenda = '$id'");
$fetchFile = mysqli_fetch_array($getFile);
$sql = mysqli_query($conn, "DELETE FROM agenda WHERE id_agenda = '$id'");
if ($sql) { 
    $file = '../../../../files/pkl/agenda/' . $fetchFile['files'];  
    unlink($file);
    ?>
    <script>
        alert('File Berhasil Dihapus!');
        location.replace('../agenda.php');
    </script>
<?php } else { ?>
    <script>
        alert('File Gagal Dihapus');
        window.history.back();
    </script>
<?php } ?>