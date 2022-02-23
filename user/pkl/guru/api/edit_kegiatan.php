<?php
include '../api/conn.php';
$id = $_POST['id'];
$nis = $_POST['nis'];
$relevansi = $_POST['relevansi'];

$getSiswa = mysqli_query($conn, "SELECT * FROM siswa WHERE nis = '$nis'");
$row = mysqli_fetch_array($getSiswa);
$sql = mysqli_query($conn, "UPDATE kegiatan set relevansi = '$relevansi'
WHERE id_kegiatan = '$id'");


if ($sql) { ?>
    <script>
        alert("Berhasil!");
        location.replace('../lihat_kegiatan.php?nis=<?php echo $nis; ?>&&nama=<?php echo $row['nama']; ?>');
    </script>
<?php } else { ?>
    <script>
        alert("Gagal!");
        location.replace('../lihat_kegiatan.php?nis=<?php echo $nis; ?>&&nama=<?php echo $row['nama']; ?>');
    </script>
<?php } ?>