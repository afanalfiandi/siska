<?php

include '../api/conn.php';
$nip = $_POST['nip'];
$nama = $_POST['nama'];

$sql = mysqli_query($conn, "UPDATE guru SET
        nama = '$nama'
         WHERE nip ='$nip'");

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