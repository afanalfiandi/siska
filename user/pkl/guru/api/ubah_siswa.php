<?php
include '../api/conn.php';

$nis = $_POST['nis'];
$nama = $_POST['nama'];
$iduka = $_POST['iduka'];

$sql = mysqli_query($conn, "UPDATE siswa SET id_iduka = '$iduka' WHERE nis = '$nis'");

if ($sql) { ?>
    <script>
        alert('Data Berhasil Diubah!');
        location.replace('../siswa.php');
    </script>
<?php } else { ?>
    <script>
        alert('Data Gagal Diubah!');
        window.history.back();
    </script>
<?php } ?>