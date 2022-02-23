<?php
include '../../api/conn.php';
$nis = $_POST['nis'];
$kegiatan = $_POST['kegiatan'];
$tgl_kegiatan = $_POST['tgl'];
// $relevansi = $_POST['relevansi'];

$sql = mysqli_query($conn, "INSERT INTO kegiatan(nis, nama_kegiatan, tgl_kegiatan) 
VALUES('$nis','$kegiatan','$tgl_kegiatan')");

if ($sql) { ?>
    <script>
        alert("Berhasil!");
        location.replace('../kegiatan.php');
    </script>
<?php } else { ?>
    <script>
        alert("Gagal!");
        window.history.back();
    </script>
<?php } ?>