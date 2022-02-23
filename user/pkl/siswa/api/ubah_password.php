<?php
include '../../api/conn.php';

$nis = $_POST['nis'];
$lama = md5($_POST['lama']);
$baru = md5($_POST['baru']);

$getData = mysqli_query($conn, "SELECT * FROM siswa WHERE nis = '$nis'");
$fetch = mysqli_fetch_array($getData);

if ($lama == $fetch['password']) {
    $sql = mysqli_query($conn, "UPDATE siswa SET password = '$baru' WHERE nis = '$nis'");

    if ($sql) { ?>
        <script>
            alert("Password berhasil diubah!");
            location.replace('../profil.php');
        </script>
    <?php } else { ?>
        <script>
            alert("Password gagal diubah!");
            window.history.back();
        </script>
    <?php }
} else { ?>
    <script>
        alert("Password yang Anda masukkan salah!");
        window.history.back();
    </script>
<?php } ?>