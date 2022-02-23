<?php
include '../../../../api/conn.php';
include('../../library/tgl_indo/lib.php');
include '../../library/kompetensi_keahlian/kompetensi_keahlian.php';
require_once("../../library/dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$id_iduka = $_GET['iduka'];
$iduka = $_GET['nama_iduka'];
$no_surat = $_GET['no_surat'];
$tgl_surat = $_GET['tgl_surat'];
$pimpinan = $_GET['pimpinan'];
$nama_iduka = $_GET['nama_iduka'];
$alamat = $_GET['alamat_iduka'];
$kk1 = $_GET['kompetensi_keahlian1'];
$kk2 = $_GET['kompetensi_keahlian2'];
$kk3 = $_GET['kompetensi_keahlian3'];
$kk4 = $_GET['kompetensi_keahlian4'];
$kk5 = $_GET['kompetensi_keahlian5'];
$jml1 = $_GET['jml_siswa1'];
$jml2 = $_GET['jml_siswa2'];
$jml3 = $_GET['jml_siswa3'];
$jml4 = $_GET['jml_siswa4'];
$jml5 = $_GET['jml_siswa5'];
$tgl_mulai = $_GET['tgl_mulai'];
$tgl_selesai = $_GET['tgl_selesai'];
$catatan = $_GET['catatan'];


$paragraf1 = $_GET['paragraf1'];
$paragraf2 = $_GET['paragraf2'];
$paragraf3 = $_GET['paragraf3'];
$paragraf4 = $_GET['paragraf4'];

$timeStart = strtotime($tgl_mulai);
$timeEnd = strtotime($tgl_selesai);
$numBulan = (date("Y", $timeEnd) - date("Y", $timeStart)) * 12;
$numBulan += date("m", $timeEnd) - date("m", $timeStart);

$text = '<html>';
$text = '
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Permohonan</title>
    <style>
    .container {
        width: 700px;
        margin: 0 auto;
    }
    .yy{
        position:absolute;
        height:88%;
        width:99%;
        z-index:1;
    }
    
    #t_a {
        margin-left: auto;
        margin-right: auto;
    }
    #a, #b, #c, #d {
        font-weight: bold;
    }
    
    #a, #b{
        font-size: 15px;
    }
    
    #c, #d {
        font-size: 20px;
    }
    
    #e, #f {
        font-size: 13px;
    }
    
    .garis_pertama {
        height: 4px;
        width: 100%;
        background-color: black;
    }
    
    .garis_dua {
        height: 1.5px;
        width: 100%;
        background-color: black;
        margin-top: 2px;
    }
    
    #t_b {
        margin-top: 1%;
        margin-left: 2%;
        max-width: 30%;
    }
    
    #t_c {
        margin-top: 1%;
        margin-right: 15%;
        float: right;
    }
    
    #t_d {
        margin-top: 2%;
        margin-left: 66%;
        max-width: 25%;
    }
    #t_e{
        margin-top: 8%;
        margin-left: 8%;
        text-align: justify;
        max-width: 84%;
    }
    #t_f{
        margin-top: 5%;
        margin-left: 66% ;
    }
    .kp{
        margin-top: 5%;
        margin-left: 66% ;
    }
    .ttd{
        padding-top: 8%;
        margin-left: 66% ;
    }
    
    .page_break{
        page-break-before:always;
    }

    /* lembar 2 */
    
    .l1{
        
        margin-left: 66% ;
    }
    .l2{
        padding-top:3%:
        text-align: center;
    }
    .p1{
       margin-left:30%; 
    }

    .p2{
        margin-left:20%; 
    }

    .p3{
        margin-left:35%; 
    }

    #l3{
        padding-top: 6%;
        margin-left: 4%;
    }

    .l4{
        margin-top: 4%;
        margin-left: 4%;
        text-align: center; 
    }
    .b{
        padding-top: -12.5%;
        margin-left: 2%;
    }

    .l5{
        padding-top: -3%;
        margin-left: 4%;
        width: 100%; 
    }
    .kpp{
        padding-top:5%;
        margin-left:66%;
    }
    .tk{
        padding-top:6%;
        margin-left:66%;
    }
    #l6{
        margin-left: 5%;
        padding-top: 7%;
        max-width: 50%;
    }
    </style>

    </head>
<body>
<div class="container">
    <table style="text-align: center;" id="t_a">
        <tr>
            <td rowspan="7" style="width:120px;">
                <img class= "yy" src="../../../assets/img/img.jpg" >
            </td>
                <tr id="a">
                    <td>PEMERINTAH PROPINSI  JAWA TENGAH</td>
                </tr>
                <tr id="b">
                    <td>DINAS PENDIDIKAN DAN KEBUDAYAAN</td>
                </tr>
                <tr id="c">
                    <td>SEKOLAH MENENGAH KEJURUAN NEGERI 1 </td>
                </tr>
                <tr id="d">
                    <td>PURWOKERTO</td>
                </tr>
                <tr id="e">
                    <td>Jalan Dr. Soeparno No. 29 Purwokerto Timur Kode Pos : 53111 Telp.  (0281) 637132  </td>
                </tr>
                <tr id="f">
                    <td>Fax. (0281) 637132  Web Site : www.smkn1purwokerto.sch.id, Email : admin@smkn1purwokerto.sch.id</td>
                </tr>
        </tr>
    </table>

    <div class="garis_pertama"></div>
    <div class="garis_dua"></div>

<table id="t_c">
    <tr>
        <td>' . convertDateDBtoIndo($tgl_surat) . '</td>
    </tr>
</table>

<table id="t_b">
    <tr>
        <td> No </td>
        <td>: ' . $no_surat . ' </td>
    </tr>
    <tr>
        <td> Lamp </td>
        <td> : 1 (satu) lembar </td>
    </tr>
    <tr>
        <td>Hal</td>
        <td>: Permohonan tempat PKL </td>
    </tr>
</table>

<table id="t_d">
    <tr>
        <td> Kepada :</td>
    </tr>
    <tr>
        <td>' . $pimpinan . ' ' . $iduka . '</td>
    </tr>
    <tr>
        <td>' . $alamat . '</td>
    </tr>
    <!--tr>
        <td>Jl. Gang Sawangan 01/02 No. 17 Kec. Kembaran Kab. Banyumas</td>
    </tr-->
</table>

<table id="t_e">
    <tr> 
        <td style="text-indent: 45px;">' . $paragraf1 . '</td>
    </tr>
    <tr> 
        <td style="text-indent: 45px ;">' . $paragraf2 . '</td>
    </tr>
    <tr>
        <td style="text-indent: 45px ;">' . $paragraf3 . '</td>
    </tr>
    <tr>
        <td style="text-indent: 45px ;">' . $paragraf4 . '</td>
    </tr>
</table>
       <div class="kp">
        Kepala Sekolah,
       </div>
    
       <div class="ttd">
           <u> Drs. Dani Priya Widada</u>
            <br>
           NIP. 19680202 199412 1 005
       </div>
       
   
</div>

<div class="page_break"></div>

<div class="container">
    <div class="l1">
        Lampiran surat no : ' . $no_surat . '
    </div> <br>

    <div class="l2">
        <a class="p1">LEMBAR PERNYATAAN KESANGGUPAN</a><br>
        <a class="p2">MERNERIMA SISWA PKL SMK NEGERI 1 PURWOKERTO </a><br>
        <a class="p3">TAHUN PELAJARAN 2020/2021 </a>
    </div><br>

    <table id="l3">
        <tr>
            <td> Nama Instansi</td>
            <td> : ' . $iduka . '</td>
        </tr>
        <tr> 
            <td> Alamat</td>
            <td> : ' . $alamat . '</td>
        </tr>
    </table>

    <table class="l4" width="650px" rules="all" border="1"> 
        <tr>
            <th height="40px"> NO.</th>
            <th height="40px">Kompetensi Keahlian</th>
            <th height="40px">Jumlah Siswa</th>
            <th height="40px">Keterangan</th>
        </tr>
        <tr>
            <td>1.</td>
            <td>' . kompetensiKeahlian($kk1) . '</td>
            <td> ' . $jml1 . '</td>
            <td> </td>
        </tr>
        <tr>
            <td>2.</td>
            <td>' . kompetensiKeahlian($kk2) . '</td>
            <td> ' . $jml2 . '</td>
            <td> </td>
        </tr>
        <tr>
            <td>3.</td>
            <td>' . kompetensiKeahlian($kk3) . '</td>
            <td> ' . $jml3 . '</td>
            <td> </td>
        </tr>
        <tr>
            <td>4.</td>
            <td>' . kompetensiKeahlian($kk4) . '</td>
            <td> ' . $jml4 . '</td>
            <td> </td>
        </tr>
        <tr>
            <td>5.</td>
            <td>' . kompetensiKeahlian($kk5) . '</td>
            <td> ' . $jml5 . '</td>
            <td> </td>
        </tr>
    </table>
    <p class="c"> Catatan :</p>
    <div class="l5">
    <p> ' . $catatan . ' </p>
    </div>
    <div class="kpp">
            .................................................
       </div>
    
       <div class="tk">
           ..................................................
            <br>
           ..................................................
       </div>
       <table id="l6">
        <tr>
            <h4 class="b"> Kontak Person  POKJA PKL :</h4>
            <td>1. Seno Nugroho, S. Kom </td>
            <td>: 081391687700</td>
        </tr>
        <tr>
            <td>2. Yusuf Achmadi, S. Pd., MM </td>
            <td>: 085227040069</td>
        </tr>
        <tr>
            <td>3. Fajar Mintaraga, S. Pd</td>
            <td>: 081223402350</td>
        </tr>
    </table>

</div>
</body>
';
$text .= "</html>";
$dompdf->loadHtml($text);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'portrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('surat-permohonan-' . $iduka . '.pdf');

$nama_file = 'surat-permohonan-' . $iduka . '.pdf';
$output = $dompdf->output();
file_put_contents('../../../../../files/pkl/surat/permohonan/surat-permohonan-' . $iduka . '.pdf', $output);
$sql = mysqli_query($conn, "INSERT INTO 
surat(id_surat_detail, id_iduka, no_surat, tgl_surat, files, keterangan) 
VALUES('1', '$id_iduka', '$no_surat', '$tgl_surat', '$nama_file','0')");

if ($sql) { ?>
    <script>
        alert('Surat Berhasil Dibuat');
        location.replace('../../rekap_surat_permohonan.php');
    </script>
<?php } else { ?>
    <script>
        alert('Surat Gagal Dibuat');
        window.history.back();
    </script>
<?php } ?>