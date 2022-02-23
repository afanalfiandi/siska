<?php
include '../../../api/conn.php';
include('../library/tgl_indo/lib.php');
require_once("../library/dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$no_sertifikat = $_GET['no_sertifikat'];
$nama_siswa = $_GET['nama_siswa'];
$nis = $_GET['nis'];
$kompetensi_keahlian = $_GET['kompetensi_keahlian'];
$nama_project = $_GET['nama_project'];
$tgl_mulai = $_GET['tgl_mulai'];
$tgl_selesai = $_GET['tgl_selesai'];
$tgl_sertif = $_GET['tgl_sertif'];
$nilai_perencanaan = $_GET['nilai_perencanaan'];
$nilai_pelaksanaan = $_GET['nilai_pelaksanaan'];
$nilai_lap_proyek = $_GET['nilai_lap_proyek'];
$nilai_sikap = $_GET['nilai_sikap'];
$nilai_akhir = $_GET['nilai_akhir'];
$jenis_pkl = $_GET['jenis_pkl'];
$thn = date('Y');
$timeStart = strtotime($tgl_mulai);
$timeEnd = strtotime($tgl_selesai);
$numBulan = (date("Y",$timeEnd)-date("Y",$timeStart))*12;
$numBulan += date("m",$timeEnd)-date("m",$timeStart);

if ($thn % 3 == 0) {
    $bg = 'sertif-satu.jpg';
}

else if ($thn % 3 == 1) {
    $bg = 'sertif-dua.jpg';
}

else {
    $bg = 'sertif-tiga.jpg';
}


if ($nilai_akhir >= 91 && $nilai_akhir <=100) {
    $hasil = "<p class='p12' style='position: absolute;
    top: 63%;
    margin-left: 43.2%;
    z-index: 2;
    font-weight: bold;
    font-size: 13px;
    color: rgb(34, 33, 33);'> <u> SANGAT KOMPETEN </u> </p>";
    $na_index = "SANGAT KOMPETEN";
    }

else if ($nilai_akhir < 91 && $nilai_akhir >=80) {
    $hasil = "<p class='p12' style='position: absolute;
    top: 63%;
    margin-left: 46.2%;
    z-index: 2;
    font-weight: bold;
    font-size: 13px;
    color: rgb(34, 33, 33);'> <u> KOMPETEN </u> </p>";
    $na_index = "KOMPETEN";
   }

   else {
    $hasil = "<p class='p12' style='position: absolute;
    top: 63%;
    margin-left: 43.2%;
    z-index: 2;
    font-weight: bold;
    font-size: 13px;
    color: rgb(34, 33, 33);'> <u> TIDAK KOMPETEN </u> </p>";
    $na_index = "TIDAK KOMPETEN";
   }

   if ($jenis_pkl == 1) {
       $margin = '30%';
       $jenis = "PRAKTIK KERJA LAPANGAN BERBASIS PROJECT";
   }

   else {
    $margin = '37.5%';
    $jenis = "PRAKTIK KERJA LAPANGAN";
    }
$text = '<html>';
$text = '
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .bord{
        height: 85%;
        width: 94%;
        position: relative;
        z-index: 1;
    }
    .p1{
        position: absolute;
        top: 17%;
        margin-left: 43%;
        z-index: 2;
        font-family: Broadway;
        font-size:x-large;
        color: rgb(15, 14, 14);
    }
    .p2{
        position: absolute;
        top: 22%;
        margin-left: ' . $margin . ';
        z-index: 2;
        font-size: 19px;
        color: rgb(34, 33, 33);
    }
    .p3{
        position: absolute;
        top: 27%;
        margin-left: 42.5%;
        z-index: 2;
        font-size: 13px;
        color: rgb(34, 33, 33);
    
    }
    .p4{
        position: absolute;
        top: 33%;
        margin-left: 42%;
        z-index: 2;
        font-size: 13px;
        color: rgb(34, 33, 33);
    }
    
    .p5{
        position: absolute;
        top: 35.5%;
        margin-left: 47%;
        z-index: 2;
        font-weight: bold;
        font-size: 13px;
        color: rgb(34, 33, 33);
    }
    
    .p6{
        position: absolute;
        top: 38%;
        margin-left: 39%;
        z-index: 2;
        font-size: 13px;
        color: rgb(34, 33, 33);
    }
    .p7{
        position: absolute;
        top: 44%;
        margin-left: 30%;
        z-index: 2;
        font-size: 13px;
        color: rgb(34, 33, 33);
    }
    .p8{
        position: absolute;
        top: 47%;
        margin-left: 30%;
        z-index: 2;
        font-size: 13px;
        color: rgb(34, 33, 33);
    
    }
    .p9{
        position: absolute;
        top: 50%;
        margin-left: 30%;
        z-index: 2;
        font-size: 13px;
        color: rgb(34, 33, 33);  
    }
    
    .t1{
        padding-left: 6.1em;
    }
    .t2{
        padding-left: 6.9em;
    }
    .p10{
        position: absolute;
        top: 55%;
        margin-left: 13%;
        z-index: 2;
        font-size: 13px;
        color: rgb(34, 33, 33);  
    }
    .p11{
        position: absolute;
        top: 59%;
        margin-left: 46%;
        z-index: 2;
        font-weight: bold;
        font-size: 13px;
        color: rgb(34, 33, 33);
    }
    .p12{
        position: absolute;
        top: 63%;
        margin-left: 46.2%;
        z-index: 2;
        font-weight: bold;
        font-size: 13px;
        color: rgb(34, 33, 33);
    
    }.p13{
        position: absolute;
        top: 67%;
        margin-left: 65%;
        z-index: 2;
        text-align: left;
        font-weight: bold;
        font-size: 13px;
        color: rgb(34, 33, 33);
    }
    .p14{
        position: absolute;
        top: 80%;
        margin-left: 65%;
        z-index: 2;
        text-align: left;
        font-weight: bold;
        font-size: 13px;
        color: rgb(34, 33, 33);
    }
    .jtg{
        position: absolute;
        height: 2%;
        width: 10%;
        top: 64px;
        margin-left: 10%;
        z-index: 2;
    }
    
    .smk{
        position: absolute;
        height: 16%;
        width: 16%;
        top: 53px;
        margin-left: 77%;
        z-index: 2;
    }
    
    .l1{
        padding-top: 4%;
        text-align: center;
        font-weight: bold;
    }
    
    #t1,#t1 tr,#t1 td, #t1 th{
        border: 1px solid black;
        border-collapse: collapse;
        margin-left: 32%;
        text-align: center;
    
    }
    #h4{
        margin-left: 5%;
        margin-top: 4%;   
    }
    #t2{

        font-weight: bold;
        margin-left: 37%;
        margin-top: 3%;
    }
    #t3,#t3 tr,#t3 td, #t3 th{
        border: 1px solid black;
        border-collapse: collapse;
        margin-left: 35%;
        text-align: center;
    }
    .l2{
        position: absolute;
        top: 60%;
        margin-left: 65%;
        z-index: 2;
        text-align: left;
        font-weight: bold;
        font-size: 13px;
        color: rgb(34, 33, 33);
    }
    .l3{
        position: absolute;
        top: 73%;
        margin-left: 65%;
        z-index: 2;
        text-align: left;
        font-weight: bold;
        font-size: 13px;
        color: rgb(34, 33, 33); 
    }
    
    </style>
</head>
<body>
<div> 
        <center> 
        <p class="p1"> SERTIFIKAT</p>
        <p class="p2"> ' . $jenis . '</p>
        <p class="p3"> NO.'. $no_sertifikat . ' /smk1purwokerto/0001</p>
  
        <p class="p4">Kepala SMK Negeri 1 Purwpkerto </p>
        <p class="p5"> Menyatakan </p>
        <p class="p6"> Bahwa  Peserta Didik SMK Negeri 1 Purwokerto </p>
         
        <p class="p7">Nama <span class="t1"> : ' . $nama_siswa . '</span> </p>
        <p class="p8">NIS  <span class="t2"> : '. $nis . '</span></p>
        <p class="p9">Kompetensi Keahlian : '. $kompetensi_keahlian .' </p>

        <p class="p10"> Telah melaksanakan Praktik Kerja Lapangan  dengan Project : <span class="judul"> <strong>'.$nama_project.'</strong></span>  , 
            Selama <span class="bulan">'.$numBulan.'</span> bulan , dari tanggal  <span class="dari"> '. convertDateDBtoIndo($tgl_mulai) .'</span>   s/d  
            <span class="finis">'. convertDateDBtoIndo($tgl_selesai) .'</span></p>

        <p class="p11">Dengan Hasil  :</p>
        <p class="p12"> <u> '.$hasil.' </u> </p>
        <p class="p13"> Purwokerto, '. convertDateDBtoIndo($tgl_sertif).' <br> Kepala SMKN 1 Purwokerto</p>
        <p class="p14"> Drs. Dani Priya Widada <br> NIP 19680202 199412 1 003</p>
        
    
        <img class="jtg" src="img/jateng.png" alt="jateng">
        <img class="smk" src="img/SMK.png" alt="smk">
        <img class="bord" src="img/' . $bg . '" alt="border">
        </center>
    </div>

    <div class="page-break"></div>

    <!-- lembar 2 -->

    <div>
        <p  class="l1"> DAFTAR  NILAI  PRAKTIK KERJA LAPANGAN</p>
        

        <h4 id="h4">A.INDIKATOR NILAI PKL PJBL</h4>
        <table style="width: 90%;" id="t1">
            <tr>
                <th> No. </th>
                <th> KOMPETENSI / SUB KOMPETENSI</th>
                <th> NILAI </th>
            </tr>
            <tr>
                <td>1.</td>
                <td style="text-align:left" >PERENCANAAN</td>
                <td>'.$nilai_perencanaan.'</td>
            </tr>
            <tr>
                <td>2.</td>
                <td style="text-align:left">PELAKSANAAN</td>
                <td>'.$nilai_pelaksanaan.'</td>
            </tr>
            <tr>
                <td>3.</td>
                <td style="text-align:left">LAPORAN PROYEK</td>
                <td>'.$nilai_lap_proyek.'</td>
            </tr>
            <tr>
                <td>4.</td>
                <td style="text-align:left">SIKAP</td>
                <td>'.$nilai_sikap.'</td>
            </tr>
            </table>

            <table id="t2"> 
            <tr>
                <th> Nilai PKL</th>
                <th> = '. $nilai_akhir .'</th>
            </tr>
            <tr> 
                <td> </td>
                <td> = ' .  $na_index . '</td>
            </tr>
            </table>

            <h4 id="h4"> Keterangan :</h4>
    <table style="width: 75%;" id="t3">
    <tr>
        <th colspan="2" > SKALA DAN PREDIKAT</th>
        <th>KETERANGAN</th>
    </tr>
    <tr>
        <td> 91 - 100 </td>
        <td>A</td>
        <td>SANGAT KOMPETEN</td>
    </tr>
    <tr>
        <td>80 - 90 </td>
        <td>B</td>
        <td>KOMPETEN</td>
    </tr>
    <tr> 
        <td> Kurang Dari 80 </td>
        <td>C</td>
        <td>TIDAK KOMPETEN</td>
    </tr>
    </table>

    <p class="l2"> Purwokerto, '. convertDateDBtoIndo($tgl_sertif) .' <br> Wakabid HKI</p>
    <p class="l3"> Seno Nugroho, S.Kom <br> NIP. 19790125 201001 1 013</p>

    </div>
    
</body>
';
$text .= "</html>";
$dompdf->loadHtml($text);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'landscape');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('sertifikat-' . $nis . '.pdf');
$nama_file = 'sertifikat-' . $nis . '.pdf';
$output = $dompdf->output();

file_put_contents('../../../../files/pkl/sertifikat/sertifikat-' . $nis . '.pdf', $output);
$sql = mysqli_query($conn, "INSERT INTO sertifikat(nis, files, tgl_sertifikat) VALUES ('$nis', '$nama_file', '$tgl_sertif')");
if ($sql) {
    echo "<script> alert('Sertifikat berhasil dibuat!'); location.replace('../../rekap_nilai.php'); </script>";
}

else {
    echo "<script> alert('Sertifikat gagal dibuat!'); location.replace('../../rekap_nilai.php'); </script>";
}
?>