<?php
include 'conn.php';
$id = $_GET['id'];
$file = $_GET['file'];
$sql = mysqli_query($conn, "DELETE FROM bukti_monitoring WHERE id_bukti_monitoring = '$id'");
if ($sql) {
    unlink('../../../../files/pkl/bukti_monitoring/' . $file);
?>
    <script>
        alert('Bukti monitoring berhasil dihapus!');
        location.replace('../bukti_monitoring.php');
    </script>
<?php } ?>