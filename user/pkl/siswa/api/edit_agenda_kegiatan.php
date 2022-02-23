<?php
include '../api/conn.php';
$id = $_POST['id'];
$kegiatan = $_POST['kegiatan'];
$tgl = $_POST['tgl'];


$sql = mysqli_query($conn, "UPDATE agenda_kegiatan set nama_kegiatan = '$kegiatan',
tgl_kegiatan = '$tgl'
WHERE id_kegiatan = '$id'");


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