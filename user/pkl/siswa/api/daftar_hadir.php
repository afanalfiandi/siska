<?php
include '../api/conn.php';
include '../../api/bln.php';
include '../../api/hari.php';
include '../../api/tgl.php';
$nama = $_POST['nama'];
$nis = $_POST['nis'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];
$iduka = $_POST['iduka'];
$pembimbing = $_POST['pembimbing'];
$nip = $_POST['nip'];
$bulan = $_POST['bulan'];

$getKehadiran = mysqli_query($conn, "SELECT * FROM kehadiran WHERE MONTH(tgl_kehadiran) = '$bulan' AND nis = '$nis'");
include 'PHPExcel/Classes/PHPExcel.php';
include 'PHPExcel/Classes/PHPExcel/Writer/Excel2007.php';

$excel = new PHPExcel();


$excel->setActiveSheetIndex(0);

//bg
$excel->getActiveSheet()->getStyle('A1:BV1000')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('B4C6E7');

//widthcell
$excel->getActiveSheet()->getColumnDimension('A')->setWidth(7);
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(24);
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(5);
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(5);
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(5);
$excel->getActiveSheet()->getColumnDimension('F')->setWidth(5);
$excel->getActiveSheet()->getColumnDimension('G')->setWidth(21);
$excel->getActiveSheet()->getColumnDimension('H')->setWidth(18);
$excel->getActiveSheet()->getRowDimension('11')->setRowHeight(20);

//kop

//text
$excel->getActiveSheet()->SetCellValue('A1', 'DAFTAR HADIR PKL');
$excel->getActiveSheet()->SetCellValue('A2', 'SMK NEGERI 1 PURWOKERTO');
$excel->getActiveSheet()->SetCellValue('A3', 'TAHUN AJARAN 2020/2021');

$excel->getActiveSheet()->SetCellValue('A5', 'Nama Siswa');
$excel->getActiveSheet()->SetCellValue('C5', $nama);

$excel->getActiveSheet()->SetCellValue('A6', 'Kelas');
$excel->getActiveSheet()->SetCellValue('C6', $kelas);

$excel->getActiveSheet()->SetCellValue('A7', 'Kompetensi Keahlian');
$excel->getActiveSheet()->SetCellValue('C7', $jurusan);

$excel->getActiveSheet()->SetCellValue('A8', 'Tempat PKL');
$excel->getActiveSheet()->SetCellValue('C8', $iduka);


$excel->getActiveSheet()->SetCellValue('A10', 'Bulan : ' . bulanIndo($bulan));

$no = 1;
$cell = 12;
$excel->getActiveSheet()->SetCellValue('A11', 'No');
foreach ($getKehadiran as $key => $value) {
    $excel->getActiveSheet()->SetCellValue('A' . $cell++, strval($no++) . ". ");
}

$excel->getActiveSheet()->SetCellValue('B11', 'Hari/Tanggal');
$cellTgl = 12;
foreach ($getKehadiran as $key => $value) {
    $tgl = $value['tgl_kehadiran'];
    $convert_tgl = DateTime::createFromFormat('Y-m-d', $tgl);
    $hari = $convert_tgl->format('l');
    $excel->getActiveSheet()->SetCellValue('B' . $cellTgl++, hari($hari) . ", " . convertDateDBtoIndo($value['tgl_kehadiran']));
}
$excel->getActiveSheet()->SetCellValue('C11', 'H');
$excel->getActiveSheet()->SetCellValue('D11', 'S');
$excel->getActiveSheet()->SetCellValue('E11', 'I');
$excel->getActiveSheet()->SetCellValue('F11', 'A');

$celKehadiran = 12;
foreach ($getKehadiran as $key => $value) {
    if ($value['id_kehadiran_detail'] == '1') {
        $excel->getActiveSheet()->SetCellValue('C' . $celKehadiran++, '✓');
    } else if ($value['id_kehadiran_detail'] == '2') {
        $excel->getActiveSheet()->SetCellValue('D' . $celKehadiran++, '✓');
    } else if ($value['id_kehadiran_detail'] == '3') {
        $excel->getActiveSheet()->SetCellValue('E' . $celKehadiran++, '✓');
    } else {
        $excel->getActiveSheet()->SetCellValue('F' . $celKehadiran++, '✓');
    }
}

$excel->getActiveSheet()->SetCellValue('G11', 'Keterangan');
$cellKeterangan = 12;
foreach ($getKehadiran as $key => $value) {
    $excel->getActiveSheet()->SetCellValue('G' . $cellKeterangan++, $value['keterangan']);
}
$excel->getActiveSheet()->SetCellValue('H11', 'TTD Pembimbing');


$excel->getActiveSheet()->SetCellValue('G45', 'Purwokerto,.....................................');
$excel->getActiveSheet()->SetCellValue('G46', 'Pembimbing IDUKA');
$excel->getActiveSheet()->SetCellValue('G50', '');





//border
$excel->getActiveSheet()->getStyle("A11:H42")->applyFromArray(
    array(
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN,
                'color' => array('rgb' => '000000')
            )
        )
    )
);

//underline
for ($i = 5; $i <= 8; $i++) {
    $excel->getActiveSheet()->getStyle("C" . $i . ":G" . $i)->applyFromArray(
        array(
            'borders' => array(
                'bottom' => array(
                    'style' => PHPExcel_Style_Border::BORDER_DOTTED,
                    'color' => array('rgb' => '000000')
                )
            )
        )
    );
}

$excel->getActiveSheet()->getStyle("B10")->applyFromArray(
    array(
        'borders' => array(
            'bottom' => array(
                'style' => PHPExcel_Style_Border::BORDER_DOTTED,
                'color' => array('rgb' => '000000')
            )
        )
    )
);
$excel->getActiveSheet()->getStyle("G50")->applyFromArray(
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
$excel->getActiveSheet()->getStyle('A1:A3')->getFont()->setBold(true);
$excel->getActiveSheet()->getStyle('A1:BV75')->getFont()->setSize(11);
$excel->getActiveSheet()->getStyle('A1:A3')->getFont()->setName('Times New Roman');
$excel->getActiveSheet()->getStyle('A5:H70')->getFont()->setName('Calibri');
//merge and center
for ($i = 1; $i <= 3; $i++) {
    $excel->getActiveSheet()->mergeCells('A' . $i . ':H' . $i . '');
}
$excel->getActiveSheet()->mergeCells('G50:H50');


//alignment
$excel->getActiveSheet()->getStyle('A1:A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$excel->getActiveSheet()->getStyle('A11:H42')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$excel->getActiveSheet()->getStyle('A11:H11')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$excel->getActiveSheet()->getStyle('D46')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
//gambar

$file = new PHPExcel_Writer_Excel2007($excel);
$date = date("Y-m-d");
$file->save(str_replace(__FILE__, $_SERVER['DOCUMENT_ROOT'] . '/siska/files/pkl/daftar_hadir/daftar_hadir-' . bulanIndo($bulan) . '-' . $nama . '-' . $date . '.xlsx', __FILE__));

$bln = bulanIndo($bulan);
$sql = mysqli_query($conn, "INSERT INTO daftar_hadir(nis, files, bulan) VALUES('$nis', 'daftar_hadir-$bln-$nama-$date.xlsx', '$bulan')");
if ($sql) { ?>
    <script>
        alert('Daftar Hadir Berhasil Dibuat!');       
        location.replace('../daftar_hadir.php');
    </script>
<?php } ?>
