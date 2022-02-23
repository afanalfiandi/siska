<?php
include './../api/conn.php';
$nis = $_POST['nis'];
$tgl = $_POST['tgl'];
$kegiatan = $_POST['kegiatan'];

$sql = mysqli_query($conn, "INSERT INTO agenda_kegiatan(nis, nama_kegiatan, tgl_kegiatan)
VALUES ('$nis','$kegiatan','$tgl')
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