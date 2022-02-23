<?php
// error_reporting(0);
include '../../../api/conn.php';
require_once('vendor/php-excel-reader/excel_reader2.php');
require_once('vendor/SpreadsheetReader.php');
$allowedFileType = ['application/vnd.ms-excel', 'text/xls', 'text/xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
if (in_array($_FILES["file"]["type"], $allowedFileType)) {
    $targetPath = 'uploads/' . $_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
    $Reader = new SpreadsheetReader($targetPath);
    $sheetCount = count($Reader->sheets());
    //$dropFK = mysqli_query($conn,"ALTER TABLE siswa DROP FOREIGN KEY nilai;");
    for ($i = 0; $i < $sheetCount; $i++) {
        $Reader->ChangeSheet($i);
        foreach ($Reader as $Kolom) {
            $nis = "";
            if (isset($Kolom[0])) {
                $nis = mysqli_real_escape_string($conn, $Kolom[0]);
            }
            $nama = "";
            if (isset($Kolom[1])) {
                $nama = mysqli_real_escape_string($conn, $Kolom[1]);
            }
            $id_kompetensi_keahlian = "";
            if (isset($Kolom[2])) {
                $id_kompetensi_keahlian = mysqli_real_escape_string($conn, $Kolom[2]);
            }
            $id_kelas = "";
            if (isset($Kolom[3])) {
                $id_kelas = mysqli_real_escape_string($conn, $Kolom[3]);
            }
            include '../library/kompetensi_keahlian/numkk.php';
            include '../library/kelas/numkelas.php';
            if (!empty($nis) || !empty($nama) || !empty($id_kompetensi_keahlian) || !empty($id_kelas)) {
                // echo "Nama: " . $nama. " , NIS : " . $nis . " , KK : " . $kompetensi_keahlian .  ", Kelas : "
                // . $kelas .
                // "<br>";

                $siswa = mysqli_query($conn, "INSERT INTO siswa(nis,nama,id_jurusan_detail,id_kelas_detail,password,img) 
                    VALUES('$nis', '$nama', '$kompetensi_keahlian', '$kelas', '202cb962ac59075b964b07152d234b70', 'default.png')");
            }
        }
    }
    if ($siswa) {
        echo "<script> alert('data berhasil ditambahkan!');location.replace('../../data_siswa.php'); </script>";
    } else {
        echo "<script> alert('data gagal ditambahkan!');location.replace('../../data_siswa.php'); </script>";
    }
    //$addFK= mysqli_query($conn, "ALTER TABLE siswa ADD CONSTRAINT nilaia FOREIGN KEY (nis) REFERENCES nilai_pkl(nis);");
} else {
    $type = "error";
    $pesan = "Tipe file salah. Upload hanya file excel.";
}
