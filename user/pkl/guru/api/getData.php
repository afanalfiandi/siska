<?php
$nip = $_SESSION['nip'];
$berita = mysqli_query($conn, "SELECT * FROM berita where tgl_terbit = date(now()) AND id_berita_detail = 2");
$tBerita = mysqli_query($conn, "SELECT COUNT(*) as total FROM berita where tgl_terbit = date(now()) && id_berita_detail = 2");
$gBerita = mysqli_fetch_array($tBerita);
$siswa = mysqli_query($conn, "SELECT * FROM siswa ORDER BY nama ASC");
$siswaBimbingan = mysqli_query($conn, "SELECT * FROM siswa 
JOIN kelas_detail ON siswa.id_kelas_detail = kelas_detail.id_kelas_detail
JOIN jurusan_detail ON siswa.id_jurusan_detail = jurusan_detail.id_jurusan_detail
JOIN iduka ON siswa.id_iduka = iduka.id_iduka
WHERE nip_pembimbing = '$nip' ORDER BY nis ASC");
$getUser = mysqli_query($conn, "SELECT * FROM guru WHERE nip='$nip' ORDER BY nama ASC");
$dudi = mysqli_query($conn, "SELECT * FROM iduka ORDER BY iduka ASC");
$jurusan = mysqli_query($conn, "SELECT * FROM jurusan_detail ORDER BY jurusan ASC");
$dMonitoring = mysqli_query($conn, "SELECT * FROM data_monitoring WHERE nip = '$nip'ORDER BY id_data_monitoring ASC");
$bMonitoring = mysqli_query($conn, "SELECT * FROM bukti_monitoring WHERE nip = '$nip'ORDER BY id_bukti_monitoring ASC");
$nilai = mysqli_query($conn, "SELECT * FROM siswa 
JOIN jurusan_detail ON siswa.id_jurusan_detail = jurusan_detail.id_jurusan_detail
JOIN kelas_detail ON siswa.id_kelas_detail = kelas_detail.id_kelas_detail
JOIN iduka ON siswa.id_iduka = iduka.id_iduka
JOIN nilai_pjbl ON siswa.nis = nilai_pjbl.nis
WHERE siswa.nip_pembimbing = '$nip'
ORDER BY nama ASC");
$sertifikat = mysqli_query($conn, "SELECT * FROM sertifikat
JOIN siswa ON sertifikat.nis = siswa.nis
JOIN kelas_detail ON siswa.id_kelas_detail = kelas_detail.id_kelas_detail
JOIN iduka ON siswa.id_iduka = iduka.id_iduka
WHERE nip_pembimbing = '$nip'");
