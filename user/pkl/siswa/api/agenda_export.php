<?php
include '../api/conn.php';
include '../../api/bln.php';
include '../../api/tgl.php';
include '../../api/hari.php';
include 'PHPExcel/Classes/PHPExcel.php';
include 'PHPExcel/Classes/PHPExcel/Writer/Excel2007.php';

$nama = $_POST['nama'];
$nis = $_POST['nis'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];
$iduka = $_POST['iduka'];
$pembimbing = $_POST['pembimbing'];
$nip = $_POST['nip'];
$bulan = $_POST['bulan'];

$getData = mysqli_query($conn, "SELECT * FROM agenda_kegiatan 
WHERE MONTH(tgl_kegiatan) = '$bulan' AND nis = '$nis'");

$excel = new PHPExcel();


$excel->setActiveSheetIndex(0);

//bg
$excel->getActiveSheet()->getStyle('A1:BV1000')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('F4B084');

//widthcell
$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(22);
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(46);
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(19);
$excel->getActiveSheet()->getRowDimension('11')->setRowHeight(30);

//kop

//text
$excel->getActiveSheet()->SetCellValue('A1', 'AGENDA KEGIATAN PKL');
$excel->getActiveSheet()->SetCellValue('A2', 'SMK NEGERI 1 PURWOKERTO');
$excel->getActiveSheet()->SetCellValue('A3', 'TAHUN AJARAN 2020/2021');

$excel->getActiveSheet()->SetCellValue('A5', 'Nama Siswa');
$excel->getActiveSheet()->SetCellValue('C5', ': ' . $nama);



$excel->getActiveSheet()->SetCellValue('A6', 'Kelas');
$excel->getActiveSheet()->SetCellValue('C6', ': ' . $kelas);


$excel->getActiveSheet()->SetCellValue('A7', 'Kompetensi Keahlian');
$excel->getActiveSheet()->SetCellValue('C7', ': ' . $jurusan);


$excel->getActiveSheet()->SetCellValue('A8', 'Tempat PKL');
$excel->getActiveSheet()->SetCellValue('C8', ': ' . $iduka);


$excel->getActiveSheet()->SetCellValue('A10', 'Bulan : ' . bulanIndo($bulan));
$excel->getActiveSheet()->SetCellValue('A11', 'No');
$excel->getActiveSheet()->SetCellValue('B11', 'Hari/Tanggal');
$excel->getActiveSheet()->SetCellValue('C11', 'Kegiatan PKL');
$excel->getActiveSheet()->SetCellValue('D11', 'TTD Pembimbing');

$excel->getActiveSheet()->SetCellValue('C44', '                                                 Purwokerto,.....................................');
$excel->getActiveSheet()->SetCellValue('C45', '                                                 Pembimbing IDUKA');
$excel->getActiveSheet()->SetCellValue('C49', '                                                ..........................................................');

$no = 1;
$cellNo = 12;
foreach ($getData as $key => $value) {
    $excel->getActiveSheet()->SetCellValue('A' . $cellNo++, strval($no++) . ". ");
}

$cellTgl = 12;
foreach ($getData as $key => $value) {
    $tgl = $value['tgl_kegiatan'];
    $convert_tgl = DateTime::createFromFormat('Y-m-d', $tgl);
    $hari = $convert_tgl->format('l');
    $excel->getActiveSheet()->SetCellValue('B' . $cellTgl++, hari($hari) . ", " . convertDateDBtoIndo($value['tgl_kegiatan']));
}

$cellKegiatan = 12;
foreach ($getData as $key => $value) {
    $excel->getActiveSheet()->SetCellValue('C' . $cellKegiatan++, $value['nama_kegiatan']);
}

//border
$excel->getActiveSheet()->getStyle("A11:D42")->applyFromArray(
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
    $excel->getActiveSheet()->getStyle("C" . $i . ":C" . $i)->applyFromArray(
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

//atur font 
$excel->getActiveSheet()->getStyle('A1:A3')->getFont()->setBold(true);
$excel->getActiveSheet()->getStyle('A1:BV75')->getFont()->setSize(11);
$excel->getActiveSheet()->getStyle('A1:A3')->getFont()->setName('Times New Roman');
$excel->getActiveSheet()->getStyle('A5:H70')->getFont()->setName('Calibri');
//merge and center
for ($i = 1; $i <= 3; $i++) {
    $excel->getActiveSheet()->mergeCells('A' . $i . ':D' . $i . '');
}

//alignment
$excel->getActiveSheet()->getStyle('A1:A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$excel->getActiveSheet()->getStyle('A11:D42')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$excel->getActiveSheet()->getStyle('A11:D11')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$excel->getActiveSheet()->getStyle('A12:A42')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$excel->getActiveSheet()->getStyle('A12:A42')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
//gambar

$file = new PHPExcel_Writer_Excel2007($excel);
$date = date("Y-m-d");
$file->save(str_replace(__FILE__, $_SERVER['DOCUMENT_ROOT'] . '/siska/files/pkl/agenda/agenda-' . bulanIndo($bulan) . '-' . $nama . '-' . $date . '.xlsx', __FILE__));

$bln = bulanIndo($bulan);
$sql = mysqli_query($conn, "INSERT INTO agenda(nis, files, bulan) 
VALUES('$nis', 'agenda-$bln-$nama-$date.xlsx', '$bulan' )");
if ($sql) { ?>
    <script>
        alert('Agenda Berhasil Dibuat!');
        location.replace('../agenda.php');
    </script>
<?php } ?>