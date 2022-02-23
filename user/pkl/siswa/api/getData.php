<?php
$nis = $_SESSION['nis'];
$berita = mysqli_query($conn, "SELECT * FROM berita where tgl_terbit = date(now()) AND id_berita_detail = 3");
$tBerita = mysqli_query($conn, "SELECT COUNT(*) as total FROM berita where tgl_terbit = date(now()) && id_berita_detail = 3");
$gBerita = mysqli_fetch_array($tBerita);
$siswa = mysqli_query($conn, "SELECT * FROM siswa ORDER BY nama ASC");
$guru = mysqli_query($conn, "SELECT * FROM guru ORDER BY nama ASC");
$dudi = mysqli_query($conn, "SELECT * FROM iduka ORDER BY iduka ASC");
$jurusan = mysqli_query($conn, "SELECT * FROM jurusan_detail ORDER BY jurusan ASC");
$kelas = mysqli_query($conn, "SELECT * FROM kelas_detail ORDER BY kelas ASC");

$getUser = mysqli_query($conn, "SELECT nis, siswa.nama, kelas, guru.nama as nama_pembimbing, iduka, siswa.img FROM siswa
JOIN kelas_detail ON siswa.id_kelas_detail = kelas_detail.id_kelas_detail
JOIN guru ON siswa.nip_pembimbing = guru.nip
JOIN jurusan_detail ON siswa.id_jurusan_detail = jurusan_detail.id_jurusan_detail
JOIN iduka ON siswa.id_iduka = iduka.id_iduka
WHERE nis = '$nis'");
