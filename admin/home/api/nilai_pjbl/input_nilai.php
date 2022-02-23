<?php
include '../../../api/conn.php';
$nis = $_POST['nis'];
$nama_project = $_POST['nama_project'];
$nilai_perencanaan = $_POST['nilai_perencanaan'];
$nilai_pelaksanaan = $_POST['nilai_pelaksanaan'];
$nilai_laporan = $_POST['nilai_laporan'];
$nilai_sikap = $_POST['nilai_sikap'];
$ket = $_POST['ket'];

echo $nis . "<br>";
echo $nama_project . "<br>";
echo $nilai_perencanaan . "<br>";
echo $nilai_pelaksanaan . "<br>";
echo $nilai_laporan . "<br>";
echo $nilai_sikap . "<br>";

if ($ket == null) {
    echo "kosong";
} else {
    echo "ada";
}

// $total = ($nilai_perencanaan + $nilai_pelaksanaan + $nilai_laporan + $nilai_sikap) / 4;

// if ($total >= 91 && $total <= 100) {
//     $keterangan = "SANGAT KOMPETEN";
// }

// else if ($total < 91 && $total >= 80) {
//     $keterangan = "KOMPETEN";
// }

// else {
//     $keterangan = "TIDAK KOMPETEN";
// }

// $sql = mysqli_query($conn, "UPDATE nilai_pjbl SET
// nama_project = '$nama_project',
// nilai_perencanaan = '$nilai_perencanaan',
// nilai_pelaksanaan = '$nilai_pelaksanaan',
// nilai_laporan = '$nilai_laporan',
// nilai_sikap = '$nilai_sikap',
// keterangan = '$keterangan'
// WHERE nis = '$nis'");

// if ($sql) {
//     echo "<script> alert('Nilai berhasil ditambahkan!'); location.replace('../../rekap_nilai.php'); </script>";
// }

// else {
//     echo "<script> alert('Nilai gagal ditambahkan!'); location.replace('../../rekap_nilai.php'); </script>";
// }
// ?>