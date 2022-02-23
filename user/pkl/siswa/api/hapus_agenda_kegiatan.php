<?php
include '../../api/conn.php';
$id = $_GET['id'];

$sql = mysqli_query($conn, "DELETE FROM agenda_kegiatan 
WHERE id_kegiatan = '$id'
");

if ($sql) { ?>
    <script>
        alert("Berhasil!");
        location.replace('../agenda.php');
    </script>
<?php } else { ?>
    <script>
        alert("Gagal!");
        window.history.back();
    </script>
<?php } ?>