<?php
include 'conn.php';
include 'PHPExcel/Classes/PHPExcel.php';
include 'PHPExcel/Classes/PHPExcel/Writer/Excel2007.php';

$form_pembimbing = $_POST['form_pembimbing'];
$nip = $_POST['nip'];
$form_jurusan = $_POST['form_jurusan'];
$dudi = $_POST['dudi'];
$alamat_dudi = $_POST['alamat_dudi'];
$pembimbing_dudi = $_POST['pembimbing_dudi'];
$no_dudi = $_POST['no_dudi'];
$peserta1 = $_POST['peserta1'];
$peserta2 = $_POST['peserta2'];
$peserta3 = $_POST['peserta3'];
$peserta4 = $_POST['peserta4'];
$peserta5 = $_POST['peserta5'];
$peserta6 = $_POST['peserta6'];
$peserta7 = $_POST['peserta7'];
$peserta8 = $_POST['peserta8'];
$peserta9 = $_POST['peserta9'];

$getIduka = mysqli_query($conn, "SELECT * FROM iduka WHERE id_iduka = '$dudi'");
$rowIduka = mysqli_fetch_array($getIduka);
$iduka = $rowIduka['iduka'];
$excel = new PHPExcel();


$excel->setActiveSheetIndex(0);


$excel->getActiveSheet()->getStyle('A1:BV71')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('FFE699');

$excel->getActiveSheet()->getColumnDimension('A')->setWidth(11.43);
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(12.57);
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(2);
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(55);
for ($i = 13; $i <= 31; $i++) {
    $excel->getActiveSheet()->getRowDimension($i)->setRowHeight(20);
}



$excel->getActiveSheet()->SetCellValue('D1', 'PEMERINTAH PROVINSI JAWA TENGAH');
$excel->getActiveSheet()->SetCellValue('D2', 'DINAS PENDIDIKAN DAN KEBUDAYAAN');
$excel->getActiveSheet()->SetCellValue('D3', 'SMK NEGERI 1 PURWOKERTO');
$excel->getActiveSheet()->SetCellValue('D4', 'Jalan Dr Soeparno No 29 Telepon (0281) 637132 Purwokerto');
$excel->getActiveSheet()->SetCellValue('D5', 'Website : www.smk1purwokerto.sch.id  Email : admin@smkn1purwokerto@yahoo.sch.id');
$excel->getActiveSheet()->SetCellValue('A8', 'LAPORAN MONITORING');
$excel->getActiveSheet()->SetCellValue('A9', 'PRAKTIK KERJA LAPANGAN (PKL)');

$excel->getActiveSheet()->SetCellValue('A13', 'Nama Pembimbing');
$excel->getActiveSheet()->SetCellValue('C13', ':');
$excel->getActiveSheet()->SetCellValue('D13', $form_pembimbing);

$excel->getActiveSheet()->SetCellValue('A14', 'Kompetensi Keahlian');
$excel->getActiveSheet()->SetCellValue('C14', ':');
$excel->getActiveSheet()->SetCellValue('D14', $form_jurusan);

$excel->getActiveSheet()->SetCellValue('A15', 'Peserta Didik');
$excel->getActiveSheet()->SetCellValue('C15', ':');
$excel->getActiveSheet()->SetCellValue('D15', '1. ' . $peserta1);
$excel->getActiveSheet()->SetCellValue('D16', '2. ' . $peserta2);
$excel->getActiveSheet()->SetCellValue('D17', '3. ' . $peserta3);
$excel->getActiveSheet()->SetCellValue('D18', '4. ' . $peserta4);
$excel->getActiveSheet()->SetCellValue('D19', '5. ' . $peserta5);
$excel->getActiveSheet()->SetCellValue('D20', '6. ' . $peserta6);
$excel->getActiveSheet()->SetCellValue('D21', '7. ' . $peserta7);
$excel->getActiveSheet()->SetCellValue('D22', '8. ' . $peserta8);
$excel->getActiveSheet()->SetCellValue('D23', '9. ' . $peserta9);

$excel->getActiveSheet()->SetCellValue('A26', 'Nama DUDI/Instansi');
$excel->getActiveSheet()->SetCellValue('C26', ':');
$excel->getActiveSheet()->SetCellValue('D26', $rowIduka['iduka']);

$jumlah = "8";
$excel->getActiveSheet()->SetCellValue('A27', 'Alamat DUDI/Instansi');
$excel->getActiveSheet()->SetCellValue('C27', ':');
$excel->getActiveSheet()->SetCellValue('D27', implode(" ", array_slice(explode(" ", $alamat_dudi), 0, $jumlah)));
$excel->getActiveSheet()->SetCellValue('D28', implode(" ", array_slice(explode(" ", $alamat_dudi), 8, 6)));
$excel->getActiveSheet()->SetCellValue('D29', implode(" ", array_slice(explode(" ", $alamat_dudi), 14, 6)));


$excel->getActiveSheet()->SetCellValue('A30', 'Pembimbing DUDI');
$excel->getActiveSheet()->SetCellValue('C30', ':');
$excel->getActiveSheet()->SetCellValue('D30', $pembimbing_dudi);

$excel->getActiveSheet()->SetCellValue('A31', 'Nomor Kontak DUDI');
$excel->getActiveSheet()->SetCellValue('C31', ':');
$excel->getActiveSheet()->SetCellValue('D31', $no_dudi, PHPExcel_Cell_DataType::TYPE_STRING);


$excel->getActiveSheet()->getStyle('D1:D3')->getFont()->setBold(true);
$excel->getActiveSheet()->getStyle('A8:A9')->getFont()->setBold(true);
$excel->getActiveSheet()->getStyle('D1:D3')->getFont()->setSize(14);
$excel->getActiveSheet()->getStyle('D4:D5')->getFont()->setSize(8);
$excel->getActiveSheet()->getStyle('A13:J31')->getFont()->setSize(12);
$excel->getActiveSheet()->getStyle('A1:BV75')->getFont()->setName('Times New Roman');

$excel->getActiveSheet()->mergeCells('A1:B5');
$excel->getActiveSheet()->mergeCells('A8:F8');
$excel->getActiveSheet()->mergeCells('A9:F9');

$excel->getActiveSheet()->getStyle('C1:J1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$excel->getActiveSheet()->getStyle('C2:J2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$excel->getActiveSheet()->getStyle('C3:J3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$excel->getActiveSheet()->getStyle('C4:J4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$excel->getActiveSheet()->getStyle('C5:J5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$excel->getActiveSheet()->getStyle('A8:J9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

for ($i = 13; $i <= 23; $i++) {
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

for ($i = 26; $i <= 29; $i++) {
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

for ($i = 30; $i <= 31; $i++) {
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


$gdImage = imagecreatefrompng('../../assets/images/jateng.png');
$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
$objDrawing->setName('Sample image');
$objDrawing->setDescription('Sample image');
$objDrawing->setImageResource($gdImage);
$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
$objDrawing->setHeight(100);
$objDrawing->setWidth(110);
$objDrawing->setCoordinates('A1');
$objDrawing->setWorksheet($excel->getActiveSheet());
$objDrawing->setOffsetX(10);
$objDrawing->setOffsetY(7);


$line = imagecreatefrompng('../../assets/images/line.png');
$lineDrawing = new PHPExcel_Worksheet_MemoryDrawing();
$lineDrawing->setName('Line');
$lineDrawing->setDescription('Line');
$lineDrawing->setImageResource($line);
$lineDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
$lineDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
$lineDrawing->setWidth(644);
$lineDrawing->setCoordinates('A6');
$lineDrawing->setOffsetY(7);
$lineDrawing->setWorksheet($excel->getActiveSheet());
$file = new PHPExcel_Writer_Excel2007($excel);
$date = date("Y-m-d");
$file->save(str_replace(__FILE__, $_SERVER['DOCUMENT_ROOT'] . '/siska/files/pkl/data_monitoring/data_monitoring-' . $form_pembimbing . '-' . $iduka . '-' . $date . '.xlsx', __FILE__));


$sql = mysqli_query($conn, "INSERT INTO data_monitoring(nip, files, id_iduka) VALUES('$nip', 'data_monitoring-$form_pembimbing-$iduka-$date.xlsx', '$dudi')");
if ($sql) { ?>
    <script>
        alert('Data Monitoring Berhasil Dibuat!');
        location.replace('../data_monitoring.php');
    </script>
<?php } ?>