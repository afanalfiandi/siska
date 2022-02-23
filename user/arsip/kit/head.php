<?php
include '../api/conn.php';
include '../api/tgl.php';
include '../api/bln.php';
include '../api/hari.php';
session_start();
$nip = $_SESSION['nip'];
$nama = $_SESSION['nama'];
$img = $_SESSION['img'];
$level = $_SESSION['level'];
$page = $_GET['page'];
if ($level == 1) {
  $tBerita = mysqli_query($conn, "SELECT COUNT(*) as total FROM berita where tgl_terbit = date(now()) && id_berita_detail = 2");
  $gBerita = mysqli_fetch_array($tBerita);
  $berita = mysqli_query($conn, "SELECT * FROM berita where tgl_terbit = date(now()) AND id_berita_detail = 2");
} else if ($level == 3) {
  $tBerita = mysqli_query($conn, "SELECT COUNT(*) as total FROM berita where tgl_terbit = date(now()) && id_berita_detail = 4");
  $gBerita = mysqli_fetch_array($tBerita);
  $berita = mysqli_query($conn, "SELECT * FROM berita where tgl_terbit = date(now()) AND id_berita_detail = 4");
}

$jenisWajib = mysqli_query($conn, "SELECT * FROM dokumen_wajib_detail ORDER BY jenis_dokumen ASC");
$countWajib = mysqli_query($conn, "SELECT COUNT(*) as total FROM dokumen_wajib WHERE nip = '$nip'");
$totalWajib = mysqli_fetch_array($countWajib);

$countSaya = mysqli_query($conn, "SELECT COUNT(*) as total FROM dokumen_saya WHERE nip = '$nip'");
$totalSaya = mysqli_fetch_array($countSaya);

$countUmum = mysqli_query($conn, "SELECT COUNT(*) as total FROM dokumen_umum");
$totalUmum = mysqli_fetch_array($countUmum);

$getWajib = mysqli_query($conn, "SELECT * FROM dokumen_wajib WHERE nip = '$nip'");
$getSaya = mysqli_query($conn, "SELECT * FROM dokumen_saya WHERE nip = '$nip'");
$getUmum = mysqli_query($conn, "SELECT * FROM dokumen_umum");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <title>
    E-ARSIP
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />

</head>

<body class="g-sidenav-show  bg-gray-100">