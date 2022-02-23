<?php

include '../api/conn.php';
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$nama_pembimbing = $_POST['nama_pembimbing'];
$iduka = $_POST['iduka'];

$sql = mysqli_query($conn, "UPDATE siswa SET
        nama = '$nama',
        id_kelas_detail = '$kelas',
        nip_pembimbing = '$nama_pembimbing',
        id_iduka = '$iduka'
         WHERE nis ='$nis'");

if ($sql) { ?>
    <script>
        alert('Data Berhasil Diubah!');
        location.replace('../profil.php');
    </script>
<?php } else { ?>
    <script>
        alert('Kesalahan Terjadi!');
        window.history.back();
    </script>
<?php } ?>