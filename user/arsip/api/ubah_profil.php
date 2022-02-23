<?php
session_start();
include 'conn.php';
$level = $_POST['level'];
$nip = $_POST['nip'];
$nama = $_POST['nama'];

if ($level == 1) {
    $sql = mysqli_query($conn, "UPDATE guru SET nama = '$nama'
         WHERE nip ='$nip'");
    if ($sql) { 
        $_SESSION['nama'] = $nama;
        ?>
        <script>
            alert('Data Berhasil Diubah!');
            location.replace('../profil.php?page=5');
        </script>
    <?php } else { ?>
        <script>
            alert('Kesalahan Terjadi!');
            window.history.back();
        </script>
    <?php }
} else {
    $sql = mysqli_query($conn, "UPDATE karyawan SET
        nama = '$nama'
         WHERE nip ='$nip'");
    if ($sql) { 
        $_SESSION['nama'] = $nama;
        ?>
        <script>
            alert('Data Berhasil Diubah!');
            location.replace('../profil.php?page=5');
        </script>
    <?php } else { ?>
        <script>
            alert('Kesalahan Terjadi!');
            window.history.back();
        </script>
<?php }
} ?>