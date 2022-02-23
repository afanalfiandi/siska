<?php
include '../api/conn.php';

$nip = $_POST['nip'];
$nis = $_POST['nis'];
$iduka = $_POST['iduka'];

$sql = mysqli_query($conn, "UPDATE siswa SET id_iduka = '$iduka',
nip_pembimbing = '$nip'
WHERE nis = '$nis'");


if ($sql) { ?>
    <script>
        alert('Data Berhasil Disimpan!');
        location.replace('../siswa.php');
    </script>
<?php } else { ?>
    <script>
        alert('Data Gagal Diubah!');
        window.history.back();
    </script>
<?php } ?>