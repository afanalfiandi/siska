<?php
include '../../api/conn.php';
$id = $_GET['id'];

$sql = mysqli_query($conn, "DELETE FROM kegiatan 
WHERE id_kegiatan = '$id'
");

if ($sql) { ?>
    <script>
        alert("Berhasil!");
        location.replace('../kegiatan.php');
    </script>
<?php } else { ?>
    <script>
        alert("Gagal!");
        location.replace('../kegiatan.php');
    </script>
<?php } ?>