<?php
include '../api/conn.php';

$nis = $_GET['nis'];
$sql = mysqli_query($conn, "UPDATE siswa SET nip_pembimbing = null WHERE nis = '$nis'");

if ($sql) { ?>
    <script>
        alert('Data Berhasil Dihapus!');
        location.replace('../siswa.php');
    </script>
<?php } else { ?>
    <script>
        alert('Data Gagal Diubah!');
        window.history.back();
    </script>
<?php } ?>