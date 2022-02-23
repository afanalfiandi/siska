<?php
include '../api/conn.php';
$nis = $_POST['nis'];
$tgl = $_POST['tgl'];
$kehadiran = $_POST['kehadiran'];
$keterangan = $_POST['keterangan'];

$sql = mysqli_query($conn, "INSERT INTO kehadiran(nis, tgl_kehadiran, id_kehadiran_detail, keterangan)
VALUES ('$nis', '$tgl', '$kehadiran', '$keterangan')
");

if ($sql) { ?>
    <script>
        alert("Berhasil!");
        location.replace('../daftar_hadir.php');
    </script>
<?php } else { ?>
    <script>
        alert("Gagal!");
        window.history.back();
    </script>
<?php } ?>