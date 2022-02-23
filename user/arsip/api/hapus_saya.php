<?php
include 'conn.php';
$id = $_GET['id'];

$getData = mysqli_query($conn, "SELECT * FROM dokumen_saya WHERE id_dokumen = '$id'");
$fetch = mysqli_fetch_array($getData);
$sql = mysqli_query($conn, "DELETE FROM dokumen_saya WHERE id_dokumen =  '$id'");

if ($sql) {
    unlink('../../../files/arsip/saya/' . $fetch['files']);
?>
    <script>
        alert('Data Berhasil Dihapus!');
        location.replace('../dok_saya.php?page=2');
    </script>
<?php } else { ?>
    <script>
        alert('Kesalahan Terjadi!');
        window.history.back();
    </script>
<?php } ?>