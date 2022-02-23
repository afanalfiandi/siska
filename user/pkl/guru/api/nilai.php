<?php
include 'conn.php';
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$kompetensi_keahlian = $_POST['kompetensi_keahlian'];
$kelas = $_POST['kelas'];
$nama_project = $_POST['nama_project'];
$nilai_perencanaan = $_POST['nilai_perencanaan'];
$nilai_pelaksanaan = $_POST['nilai_pelaksanaan'];
$nilai_laporan = $_POST['nilai_laporan'];
$nilai_sikap = $_POST['nilai_sikap'];

$nilai_akhir = ($nilai_perencanaan + $nilai_pelaksanaan + $nilai_laporan + $nilai_sikap) / 4;
if ($nilai_akhir >= 91 && $nilai_akhir <= 100) {
    $keterangan = "SANGAT KOMPETEN";
} else if ($nilai_akhir < 91 && $nilai_akhir >= 80) {
    $keterangan = "KOMPETEN";
} else {
    $keterangan = "TIDAK KOMPETEN";
}
$sql = mysqli_query($conn, "INSERT INTO nilai_pjbl(nis, nama_project,
nilai_perencanaan,
nilai_pelaksanaan,
nilai_laporan,
nilai_sikap,
nilai_akhir,
keterangan)
VALUES ('$nis', '$nama_project', 
'$nilai_perencanaan',
'$nilai_pelaksanaan',
'$nilai_laporan',
'$nilai_sikap',
'$nilai_akhir',
'$keterangan')
");

if ($sql) { ?>
    <script>
        alert('Nilai berhasil disimpan!');
        location.replace('../nilai.php');
    </script>
<?php } else { ?>
    <script>
        alert('Nilai gagal disimpan!');
        window.history.back();
    </script>
<?php } ?>