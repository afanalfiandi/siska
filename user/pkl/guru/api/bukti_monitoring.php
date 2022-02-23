<?php
include 'conn.php';
include '../../api/tgl.php';
include '../../api/hari.php';

include 'PHPExcel/Classes/PHPExcel.php';
include 'PHPExcel/Classes/PHPExcel/Writer/Excel2007.php';
$excel = new PHPExcel();



$jurusan = $_POST['jurusan'];
$nama_dudi = $_POST['nama_dudi'];
$ke = $_POST['ke'];
$tgl_monitoring = $_POST['tgl_monitoring'];
$nama_dudi = $_POST['nama_dudi'];
$alamat = $_POST['alamat'];
$guru = $_POST['guru'];
$nip = $_POST['nip'];
$peserta = $_POST['peserta'];
$kegiatan = $_POST['kegiatan'];
$relevansi = $_POST['relevansi'];
$kegiatan_saran = $_POST['kegiatan_saran'];
$saran = $_POST['saran'];
$catatan = $_POST['catatan'];
$totalKegiatan = count($kegiatan);

$convert_tgl = DateTime::createFromFormat('Y-m-d', $tgl_monitoring);
$hari = $convert_tgl->format('l');

$getJurusan = mysqli_query($conn, "SELECT * FROM jurusan_detail WHERE id_jurusan_detail = '$jurusan'");
$getDudi = mysqli_query($conn, "SELECT * FROM iduka WHERE id_iduka = '$nama_dudi'");
$getSiswa = mysqli_query($conn, "SELECT * FROM siswa WHERE nis = '$peserta'");
$rowJurusan = mysqli_fetch_array($getJurusan);
$rowDudi = mysqli_fetch_array($getDudi);
$rowSiswa = mysqli_fetch_array($getSiswa);


$excel->setActiveSheetIndex(0);

//bg
$excel->getActiveSheet()->getStyle('A1:BV1000')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('B4C6E7');

//format cell
$excel->getActiveSheet()->getStyle('A15:A28')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
$excel->getActiveSheet()->getStyle('A33:A39')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);

//widthcell
$excel->getActiveSheet()->getColumnDimension('A')->setWidth(4);
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(23);
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(2);
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(33);
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(11);
$excel->getActiveSheet()->getColumnDimension('F')->setWidth(11);

//kop

//text
$excel->getActiveSheet()->SetCellValue('A1', 'BUKTI LAPORAN MONITORING');
$excel->getActiveSheet()->SetCellValue('A3', 'PELAKSANAAN MONITORING');

$excel->getActiveSheet()->SetCellValue('A4', 'Kompetensi Keahlian');
$excel->getActiveSheet()->SetCellValue('C4', ':');
$excel->getActiveSheet()->SetCellValue('D4', $rowJurusan['jurusan']);

$excel->getActiveSheet()->SetCellValue('A5', 'Monitoring Ke');
$excel->getActiveSheet()->SetCellValue('C5', ':');
$excel->getActiveSheet()->SetCellValue('D5', $ke);

$excel->getActiveSheet()->SetCellValue('A6', 'Hari/Tanggal');
$excel->getActiveSheet()->SetCellValue('C6', ':');
$excel->getActiveSheet()->SetCellValue('D6', hari($hari) . ", " . convertDateDBtoIndo($tgl_monitoring));

$excel->getActiveSheet()->SetCellValue('A7', 'Nama DUDI');
$excel->getActiveSheet()->SetCellValue('C7', ':');
$excel->getActiveSheet()->SetCellValue('D7', $rowDudi['iduka']);

$excel->getActiveSheet()->SetCellValue('A8', 'Alamat DUDI');
$excel->getActiveSheet()->SetCellValue('C8', ':');
$excel->getActiveSheet()->SetCellValue('D8', $alamat);

$excel->getActiveSheet()->SetCellValue('A9', 'Guru Pelaksana Monitoring');
$excel->getActiveSheet()->SetCellValue('C9', ':');
$excel->getActiveSheet()->SetCellValue('D9', $guru);

$excel->getActiveSheet()->SetCellValue('A12', 'DATA PESERTA DIDIK DAN KESESUAIAN DENGAN KOMPETENSI KEAHLIAN');
$excel->getActiveSheet()->SetCellValue('A13', 'No');
for ($i = 1; $i <= $totalKegiatan; $i++) {
    $a = 15;
    $tot = $a + $totalKegiatan;
    for ($b = $a; $b < $tot; $b++) {        
        $excel->getActiveSheet()->SetCellValue('A' . $b, strval($i++) . ". ");
    }
}


$excel->getActiveSheet()->SetCellValue('B13', 'Nama Peserta Didik');
$excel->getActiveSheet()->SetCellValue('B15', $rowSiswa['nama']);



$excel->getActiveSheet()->SetCellValue('C13', 'Kegiatan PKL');
for ($i = 0; $i < $totalKegiatan; $i++) {
    $a = 15;
    $tot = $a + $totalKegiatan;
    for ($b = $a; $b < $tot; $b++) {
        $excel->getActiveSheet()->SetCellValue('C' . $b, $kegiatan[$i++]);
    }
}

$excel->getActiveSheet()->SetCellValue('E13', 'Relevansi dengan KK');
$totalRelevansi = count($relevansi);
for ($i = 0; $i < $totalRelevansi; $i++) {
    $a = 15;
    $tot = $a + $totalRelevansi;
    for ($b = $a; $b < $tot; $b++) {
        if ($relevansi[$i] == "Ya") {
            $excel->getActiveSheet()->SetCellValue('E' . $b, '✓' . empty($relevansi[$i++]));
        } else {
            $excel->getActiveSheet()->SetCellValue('F' . $b, '✓' . empty($relevansi[$i++]));
        }
    }
}

$excel->getActiveSheet()->SetCellValue('E14', 'Ya');


$excel->getActiveSheet()->SetCellValue('F14', 'Tidak');
$excel->getActiveSheet()->SetCellValue('D29', '*Beri tanda (V) pada item jawaban');
$excel->getActiveSheet()->SetCellValue('A30', 'SARAN DAN USULAN PESERTA DIDIK');

$excel->getActiveSheet()->SetCellValue('A32', 'No');
$totalKeg_Saran = count($kegiatan_saran);
for ($i = 1; $i <= $totalKeg_Saran; $i++) {
    $a = 33;
    $tot = $a + $totalKeg_Saran;
    for ($b = $a; $b < $tot; $b++) {
        $excel->getActiveSheet()->SetCellValue('A' . $b, strval($i++) .". ");
    }
}

$excel->getActiveSheet()->SetCellValue('B32', 'Kegiatan');
for ($i = 0; $i < $totalKeg_Saran; $i++) {
    $a = 33;
    $tot = $a + $totalKeg_Saran;
    for ($b = $a; $b < $tot; $b++) {
        $excel->getActiveSheet()->SetCellValue('B' . $b, $kegiatan_saran[$i++]);
    }
}

$excel->getActiveSheet()->SetCellValue('C32', 'Saran/Masukan');
$totalSaran = count($saran);
for ($i = 0; $i < $totalSaran; $i++) {
    $a = 33;
    $tot = $a + $totalSaran;
    for ($b = $a; $b < $tot; $b++) {
        $excel->getActiveSheet()->SetCellValue('C' . $b, $saran[$i++]);
    }
}


$excel->getActiveSheet()->SetCellValue('E32', 'Catatan');
$totalCatatan = count($catatan);
for ($i = 0; $i < $totalCatatan; $i++) {
    $a = 33;
    $tot = $a + $totalCatatan;
    for ($b = $a; $b < $tot; $b++) {
        $excel->getActiveSheet()->SetCellValue('E' . $b, $catatan[$i++]);
    }
}

$excel->getActiveSheet()->SetCellValue('A42', 'Purwokerto, ' . convertDateDBtoIndo($tgl_monitoring));
$excel->getActiveSheet()->SetCellValue('A43', 'Guru Pembimbing PKL');
$excel->getActiveSheet()->SetCellValue('A48', $guru);
$excel->getActiveSheet()->SetCellValue('A49', 'NIP. ' . $nip);

$excel->getActiveSheet()->SetCellValue('E42', 'Peserta Didik');
$excel->getActiveSheet()->SetCellValue('E48', $rowSiswa['nama']);
$excel->getActiveSheet()->SetCellValue('E49', 'NIS. ' . $peserta);


$excel->getActiveSheet()->getStyle("A13:F28")->applyFromArray(
    array(
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN,
                'color' => array('rgb' => '000000')
            )
        )
    )
);
$excel->getActiveSheet()->getStyle("A32:F39")->applyFromArray(
    array(
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN,
                'color' => array('rgb' => '000000')
            )
        )
    )
);

$excel->getActiveSheet()->getStyle("A48:B48")->applyFromArray(
    array(
        'borders' => array(
            'bottom' => array(
                'style' => PHPExcel_Style_Border::BORDER_DOTTED,
                'color' => array('rgb' => '000000')
            )
        )
    )
);
$excel->getActiveSheet()->getStyle("E48:F48")->applyFromArray(
    array(
        'borders' => array(
            'bottom' => array(
                'style' => PHPExcel_Style_Border::BORDER_DOTTED,
                'color' => array('rgb' => '000000')
            )
        )
    )
);
//atur font 
$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
$excel->getActiveSheet()->getStyle('D29')->getFont()->setBold(true);
$excel->getActiveSheet()->getStyle('A1:BV75')->getFont()->setSize(11);
$excel->getActiveSheet()->getStyle('A1:BV75')->getFont()->setName('Times New Roman');
//merge and center
$excel->getActiveSheet()->mergeCells('A1:F1');
$excel->getActiveSheet()->mergeCells('A13:A14');
$excel->getActiveSheet()->mergeCells('B13:B14');
$excel->getActiveSheet()->mergeCells('C13:D14');
$excel->getActiveSheet()->mergeCells('E13:F13');
$excel->getActiveSheet()->mergeCells('D29:F29');
for ($i = 15; $i <= 28; $i++) {
    $excel->getActiveSheet()->mergeCells('C' . $i . ':D' . $i . '');
}
for ($i = 32; $i <= 39; $i++) {
    $excel->getActiveSheet()->mergeCells('C' . $i . ':D' . $i . '');
}
for ($i = 32; $i <= 39; $i++) {
    $excel->getActiveSheet()->mergeCells('E' . $i . ':F' . $i . '');
}
$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$excel->getActiveSheet()->getStyle('A4:D9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
$excel->getActiveSheet()->getStyle('A13:F14')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$excel->getActiveSheet()->getStyle('E15:F28')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$excel->getActiveSheet()->getStyle('A32:F32')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$excel->getActiveSheet()->getStyle('A13:D13')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
//gambar

$file = new PHPExcel_Writer_Excel2007($excel);
$file->save(str_replace(__FILE__, $_SERVER['DOCUMENT_ROOT'] . '/siska/files/pkl/bukti_monitoring/bukti_monitoring-' . $ke . '-'. $peserta . '-' . $rowDudi['iduka'] . '-' . $tgl_monitoring . '.xlsx', __FILE__));


$sql = mysqli_query($conn, "INSERT INTO bukti_monitoring(nip, files, id_iduka) 
VALUES('$nip', 'bukti_monitoring-$ke-$peserta-". $rowDudi['iduka'] . "-$tgl_monitoring.xlsx', '$nama_dudi')");
if ($sql) { ?>
    <script>
        alert('Bukti Monitoring Berhasil Dibuat!');
        location.replace('../bukti_monitoring.php');
    </script>
<?php } ?>