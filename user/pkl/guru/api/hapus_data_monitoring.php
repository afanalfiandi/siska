<?php
include 'conn.php';
$id = $_GET['id'];
$file = $_GET['file'];
$sql = mysqli_query($conn, "DELETE FROM data_monitoring WHERE id_data_monitoring = '$id'");
if ($sql) {
    unlink('../../../../files/pkl/data_monitoring/' . $file);
?>
    <script>
        alert('Data monitoring berhasil dihapus!');
        location.replace('../data_monitoring.php');
    </script>
<?php } ?>