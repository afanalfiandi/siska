<?php
include 'conn.php';

$level = $_POST['level'];
$nip = $_POST['nip'];
$lama = md5($_POST['lama']);
$baru = md5($_POST['baru']);

if ($level == 1) {
    $getData = mysqli_query($conn, "SELECT * FROM guru WHERE nip = '$nip'");
    $fetch = mysqli_fetch_array($getData);

    if ($lama == $fetch['password']) {
        $sql = mysqli_query($conn, "UPDATE guru SET password = '$baru' WHERE nip = '$nip'");

        if ($sql) { ?>
            <script>
                alert("Password berhasil diubah!");
                location.replace('../profil.php?page=5');
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
        <?php }
} else {
    $getData = mysqli_query($conn, "SELECT * FROM karyawan WHERE nip = '$nip'");
    $fetch = mysqli_fetch_array($getData);

    if ($lama == $fetch['password']) {
        $sql = mysqli_query($conn, "UPDATE karyawan SET password = '$baru' WHERE nip = '$nip'");

        if ($sql) { ?>
            <script>
                alert("Password berhasil diubah!");
                location.replace('../profil.php?page=5');
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
<?php }
} ?>