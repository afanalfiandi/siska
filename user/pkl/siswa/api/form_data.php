<?php
include 'conn.php';
$pembimbing = $_POST['pembimbing'];
$iduka = $_POST['iduka'];
$nis = $_POST['nis'];
$sql = mysqli_query($conn, "UPDATE siswa SET nip_pembimbing = '$pembimbing', id_iduka = '$iduka' WHERE nis = '$nis'");
if ($sql) { ?>
    <script>
        alert('Data berhasil disimpan!');
        location.replace('../');
    </script>
<?php } else { ?>
    <script>
        alert('Data gagal disimpan!');
        window.history.back();
    </script>
<?php } ?>