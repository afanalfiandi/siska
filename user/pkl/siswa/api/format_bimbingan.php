<?php
include '../../api/conn.php';
include 'PHPExcel/Classes/PHPExcel.php';
include 'PHPExcel/Classes/PHPExcel/Writer/Excel2007.php';

$excel = new PHPExcel();

$excel->setActiveSheetIndex(0);

$nama = $_POST['nama'];
$nis = $_POST['nis'];
$ke = $_POST['ke'];
$jurusan = $_POST['jurusan'];
$iduka = $_POST['iduka'];
$alamat = $_POST['alamat'];
$pembimbing = $_POST['pembimbing'];
$nip = $_POST['nip'];
$tgl_mulai = $_POST['tgl_mulai'];
$tgl_akhir = $_POST['tgl_akhir'];

$getKegiatan = mysqli_query($conn, "SELECT * FROM kegiatan 
WHERE nis = '101' AND tgl_kegiatan BETWEEN '$tgl_mulai' AND '$tgl_akhir'
ORDER BY tgl_kegiatan ASC
");
// $getKegiatan = mysqli_query($conn, "SELECT * FROM kegiatan WHERE nis = '$nis' AND MONTH(tgl_kegiatan) = '$bln' ORDER BY tgl_kegiatan ASC");
// $getTotal = mysqli_query($conn, "SELECT COUNT(nama_kegiatan) as t_kegiatan,
// COUNT(tgl_kegiatan) as t_tgl,
// COUNT(relevansi) as t_relevansi
// FROM kegiatan WHERE nis = '$nis' AND MONTH(tgl_kegiatan) = '$bln' ORDER BY tgl_kegiatan ASC");
// $fetchKegiatan = mysqli_fetch_array($getKegiatan);
// $tgl = $fetchKegiatan['tgl_kegiatan'];
// $fetchTotal = mysqli_fetch_array($getTotal);

// $t_kegiatan = $fetchTotal['t_kegiatan'];

// //bg
$excel->getActiveSheet()->getStyle('A1:BV1000')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('B4C6E7');

//widthcell
$excel->getActiveSheet()->getColumnDimension('A')->setWidth(4);
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(23);
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(2);
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(40);
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(11);
$excel->getActiveSheet()->getColumnDimension('F')->setWidth(11);

//kop

//text
$excel->getActiveSheet()->SetCellValue('A1', 'FORMAT BIMBINGAN');
$excel->getActiveSheet()->SetCellValue('A3', 'PELAKSANAAN KEGIATAN');

$excel->getActiveSheet()->SetCellValue('A4', 'Nama Peserta Didik');
$excel->getActiveSheet()->SetCellValue('C4', ':');
$excel->getActiveSheet()->SetCellValue('D4', $nama);

$excel->getActiveSheet()->SetCellValue('A5', 'Kompetensi Keahlian');
$excel->getActiveSheet()->SetCellValue('C5', ':');
$excel->getActiveSheet()->SetCellValue('D5', $jurusan);

$excel->getActiveSheet()->SetCellValue('A6', 'Monitoring Ke');
$excel->getActiveSheet()->SetCellValue('C6', ':');
$excel->getActiveSheet()->SetCellValue('D6', $ke);

$excel->getActiveSheet()->SetCellValue('A7', 'Nama DUDI');
$excel->getActiveSheet()->SetCellValue('C7', ':');
$excel->getActiveSheet()->SetCellValue('D7', $iduka);

$excel->getActiveSheet()->SetCellValue('A8', 'Alamat Dudi');
$excel->getActiveSheet()->SetCellValue('C8', ':');
$excel->getActiveSheet()->SetCellValue('D8', $alamat);

$excel->getActiveSheet()->SetCellValue('A12', 'No');
// $t_kegiatan = $fetchTotal['t_kegiatan'];
// $t_tgl = $fetchTotal['t_tgl'];

// for ($no = 1; $no <= $t_kegiatan; $no++) {
//     $cell = 14;
//     $t_cell = $t_kegiatan + $cell;
//     for ($write = $cell; $write < $t_cell; $write++) {
//         $excel->getActiveSheet()->SetCellValue('A' . $write, strval($no++) . ". ");
//         foreach ($getKegiatan as $key => $value) {
//             $excel->getActiveSheet()->SetCellValue('B' . $write, $value['tgl_kegiatan']);
//             $excel->getActiveSheet()->SetCellValue('C' . $write, $value['nama_kegiatan']);
//         }
//     }
// }

$cell = 14;
$no = 1;
foreach ($getKegiatan as $key => $value) {
    $excel->getActiveSheet()->SetCellValue('A' . $cell++, strval($no++) . ". ");
}
$cell_tgl = 14;
foreach ($getKegiatan as $key => $value) {
    $excel->getActiveSheet()->SetCellValue('B' . $cell_tgl++, $value['tgl_kegiatan']);
}
$cell_kegiatan = 14;
foreach ($getKegiatan as $key => $value) {
    $excel->getActiveSheet()->SetCellValue('C' . $cell_kegiatan++, $value['nama_kegiatan']);
}
$cell_relevansi = 14;
foreach ($getKegiatan as $key => $value) {
    if ($value['relevansi'] == '1') {
        $excel->getActiveSheet()->SetCellValue('E' . $cell_relevansi++, '✓');
    } else {
        $excel->getActiveSheet()->SetCellValue('F' . $cell_relevansi++, '✓');
    }
}



$excel->getActiveSheet()->SetCellValue('B12', 'Tanggal Kegiatan');
// for ($no = 1; $no <= $t_tgl; $no++) {
//     $cell = 14;
//     $t_cell = $t_tgl + $cell;
//     for ($write = $cell; $write <= $t_cell; $write++) {
//         $excel->getActiveSheet()->SetCellValue('B' . $write, $tgl[$no]);
//     }
// }

$excel->getActiveSheet()->SetCellValue('C12', 'Kegiatan PKL');


$excel->getActiveSheet()->SetCellValue('E12', 'Relevansi dengan KK');


$excel->getActiveSheet()->SetCellValue('E13', 'Ya');


$excel->getActiveSheet()->SetCellValue('F13', 'Tidak');


$excel->getActiveSheet()->SetCellValue('D46', '*Beri tanda (V) pada item jawaban');


$excel->getActiveSheet()->SetCellValue('A48', 'Guru Pembimbing PKL');
$excel->getActiveSheet()->SetCellValue('A53', $pembimbing);
$excel->getActiveSheet()->SetCellValue('A54', 'NIP. ' . $nip);

$excel->getActiveSheet()->SetCellValue('E48', 'Peserta Didik');
$excel->getActiveSheet()->SetCellValue('E53', $nama);
$excel->getActiveSheet()->SetCellValue('E54', 'NIS. ' . $nis);


$excel->getActiveSheet()->getStyle("A12:F44")->applyFromArray(
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
for ($i = 4; $i <= 8; $i++) {
    $excel->getActiveSheet()->getStyle("D" . $i)->applyFromArray(
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

$excel->getActiveSheet()->getStyle("A53:B53")->applyFromArray(
    array(
        'borders' => array(
            'bottom' => array(
                'style' => PHPExcel_Style_Border::BORDER_DOTTED,
                'color' => array('rgb' => '000000')
            )
        )
    )
);

$excel->getActiveSheet()->getStyle("E53:F53")->applyFromArray(
    array(
        'borders' => array(
            'bottom' => array(
                'style' => PHPExcel_Style_Border::BORDER_DOTTED,
                'color' => array('rgb' => '000000')
            )
        )
    )
);

//format cell
$excel->getActiveSheet()->getStyle('D6')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
$excel->getActiveSheet()->getStyle('A14')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);

//atur font 
$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
$excel->getActiveSheet()->getStyle('D46')->getFont()->setBold(true);
$excel->getActiveSheet()->getStyle('A1:BV75')->getFont()->setSize(11);
$excel->getActiveSheet()->getStyle('A1:BV75')->getFont()->setName('Times New Roman');
//merge and center
$excel->getActiveSheet()->mergeCells('A1:F1');
$excel->getActiveSheet()->mergeCells('A12:A13');
$excel->getActiveSheet()->mergeCells('A53:B53');
$excel->getActiveSheet()->mergeCells('B12:B13');
$excel->getActiveSheet()->mergeCells('C12:D13');
$excel->getActiveSheet()->mergeCells('D46:F46');
$excel->getActiveSheet()->mergeCells('E12:F12');
$excel->getActiveSheet()->mergeCells('E53:F53');
for ($i = 14; $i <= 44; $i++) {
    $excel->getActiveSheet()->mergeCells('C' . $i . ':D' . $i . '');
}

$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$excel->getActiveSheet()->getStyle('D46')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$excel->getActiveSheet()->getStyle('A12:F44')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$excel->getActiveSheet()->getStyle('A12:F13')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$file = new PHPExcel_Writer_Excel2007($excel);
$date = date("Y-m-d");
$file->save(str_replace(__FILE__, $_SERVER['DOCUMENT_ROOT'] . '/siska/files/pkl/format_bimbingan/format_bimbingan-' . $tgl_mulai . '-' . $tgl_akhir . '-' . $nama . '-' . $date . '.xlsx', __FILE__));

$sql = mysqli_query($conn, "INSERT INTO format_bimbingan(nis, files, tgl_mulai, tgl_akhir) VALUES('$nis', 'format_bimbingan-$tgl_mulai-$tgl_akhir-$nama-$date.xlsx', '$tgl_mulai', '$tgl_akhir')");
if ($sql) { ?>
    <script>
        alert('Data Monitoring Berhasil Dibuat!');       
        location.replace('../format_bimbingan.php');
    </script>
<?php } ?>