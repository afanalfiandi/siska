<?php
error_reporting(0);
include '../../../api/conn.php';
require_once('vendor/php-excel-reader/excel_reader2.php');
require_once('vendor/SpreadsheetReader.php');
$allowedFileType = ['application/vnd.ms-excel', 'text/xls', 'text/xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
if (in_array($_FILES["file"]["type"], $allowedFileType)) {
    $targetPath = 'uploads/' . $_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
    $Reader = new SpreadsheetReader($targetPath);
    $sheetCount = count($Reader->sheets());
    for ($i = 0; $i < $sheetCount; $i++) {
        $Reader->ChangeSheet($i);
        foreach ($Reader as $Kolom) {
            $nip = "";
            if (isset($Kolom[0])) {
                $nip = mysqli_real_escape_string($conn, $Kolom[0]);
            }

            $nama = "";
            if (isset($Kolom[1])) {
                $nama = mysqli_real_escape_string($conn, $Kolom[1]);
            }

            $id_kompetensi_keahlian = "";
            if (isset($Kolom[2])) {
                $id_kompetensi_keahlian = mysqli_real_escape_string($conn, $Kolom[2]);
            }

            include '../library/kompetensi_keahlian/numkk.php';
            if (!empty($nip) || !empty($nama) || !empty($id_kompetensi_keahlian)) {

                // echo "nip : " . $nip . "<br>";
                // echo "nama : " . $nama . "<br>";
                // echo "id_kompetensi_keahlian : " . $id_kompetensi_keahlian . "<br>";
                $query = "INSERT into guru(nip,nama,id_jurusan_detail,password,img) 
                  values('$nip','$nama','$kompetensi_keahlian','202cb962ac59075b964b07152d234b70','default.png')";
                $result = mysqli_query($conn, $query);
            }
        }
    }
    if ($result) {
        echo "<script> alert('Data berhasil ditambahkan!'); location.replace('../../data_pegawai.php'); </script>";
    } else {
        echo "<script> alert('Data gagal ditambahkan!'); location.replace('../../data_pegawai.php'); </script>";
    }
} else {
    echo "<script> alert('Format File Salah!'); location.replace('../../data_pegawai.php'); </script>";

}
