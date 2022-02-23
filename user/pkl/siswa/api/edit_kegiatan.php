<?php
include '../api/conn.php';
$id = $_POST['id'];
$kegiatan = $_POST['kegiatan'];
$tgl = $_POST['tgl'];
$relevansi = $_POST['relevansi'];

$sql = mysqli_query($conn, "UPDATE kegiatan set nama_kegiatan = '$kegiatan',
tgl_kegiatan = '$tgl',
relevansi = '$relevansi'
WHERE id_kegiatan = '$id'");


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