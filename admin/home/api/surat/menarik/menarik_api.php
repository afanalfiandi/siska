<?php
require_once("../../library/dompdf/autoload.inc.php");
include "../../library/tgl_indo/lib.php";
include '../../../../api/conn.php';

use Dompdf\Dompdf;
$dompdf = new Dompdf();

$no_surat = $_GET['no_surat'];
$lampiran = $_GET['lampiran'];
$hal = $_GET['hal'];
$iduka = $_GET['iduka'];
$iduka = $_GET['iduka'];
$nama_iduka = $_GET['nama_iduka'];
$pimpinan = $_GET['pimpinan'];
$alamat_iduka = $_GET['alamat_iduka'];
$tgl_mulai = $_GET['tgl_mulai'];
$tgl_selesai = $_GET['tgl_selesai'];
$nama_pembimbing = $_GET['nama_pembimbing'];
$nama_siswa1 = $_GET['nama_siswa1'];
$nama_siswa2 = $_GET['nama_siswa2'];
$nama_siswa3 = $_GET['nama_siswa3'];
$nama_siswa4 = $_GET['nama_siswa4'];
$nama_siswa5 = $_GET['nama_siswa5'];
$kompetensi_keahlian1 = $_GET['kompetensi_keahlian1'];
$kompetensi_keahlian2 = $_GET['kompetensi_keahlian2'];
$kompetensi_keahlian3 = $_GET['kompetensi_keahlian3'];
$kompetensi_keahlian4 = $_GET['kompetensi_keahlian4'];
$kompetensi_keahlian5 = $_GET['kompetensi_keahlian5'];
$kelas1 = $_GET['kelas1'];
$kelas2 = $_GET['kelas2'];
$kelas3 = $_GET['kelas3'];
$kelas4 = $_GET['kelas4'];
$kelas5 = $_GET['kelas5'];
$keterangan1 = $_GET['keterangan1'];
$keterangan2 = $_GET['keterangan2'];
$keterangan3 = $_GET['keterangan3'];
$keterangan4 = $_GET['keterangan4'];
$keterangan5 = $_GET['keterangan5'];
$timeStart = strtotime($tgl_mulai);
$timeEnd = strtotime($tgl_selesai);
$numBulan = (date("Y",$timeEnd)-date("Y",$timeStart))*12;
$numBulan += date("m",$timeEnd)-date("m",$timeStart);
$tgl_surat = date('Y-m-d');

$text = '<html>';
$text = '
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
    .container {
        width: 100%;
    }
    img.logo{
        height:20px;
        width:20px;
        position:relative
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
        padding-left: 10%;
        max-width: 85%;
        padding-right: 3%;
    }
    #t_e{
        margin-top: 5%;
        padding-left: 10%;
        text-align: justify;
        max-width: 85;
        padding-right: 3%;
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
        margin-top: 3%;
        margin-left: 66%;
        margin-bottom:4%;
    }
    .page_break {page-break-before: always;}
    
    
    /* lembar 2 */

    
    .l1{
        
        margin-left: 55% ;
    }
    .l2{
        padding-top:3px:
        text-align: center;
    }
    .p1{
       margin-left:34%; 
    }

    .p2{
        margin-left:34%; 
    }

    .p3{
        margin-left:40%; 
    }

    #l3{
        padding-top: 2px;
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
    .c{
        padding-top: 5%;
        margin-left: 4%;
    }
    .l5{
        padding-top: 10%;
        margin-left: 4%;
        width: 100%; 
    }
    }
    .tk{
        padding-top:35%;
        margin-left:66%;
    }
    #l6{
        margin-left: 5%;
        padding-top: 5%;
        max-width: 50%;
    }
    #dh{
        padding-bottom: 20px;
    }

    </style>
</head>
<body>
<div class="container">
    <table border="0" style="text-align: center;" id="t_a">
        <tr>
            <td rowspan="7">
            <img id="logo" src="../../../assets/img/img.jpg" alt="" height="150px" width="auto" >
            </td> 
        </tr>
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
        <td> : ' . $no_surat . '</td>
    </tr>
    <tr>
        <td> Lamp </td>
        <td> : ' . $lampiran . '</td>
    </tr>
    <tr>
        <td>Hal</td>
        <td>: ' . $hal . '</td>
    </tr>
</table>

<table id="t_d">
    <tr>
        <td> Kepada Yth : </td>
    </tr>
    <tr>
        <td>' . $pimpinan . ' ' . $nama_iduka . '</td>
    </tr>
    <tr>
        <td>' . $alamat_iduka . '</td>
    </tr>
</table>

<table id="t_e" >
    <tr >
        <td id="dh"> Dengan hormat, <br> </td>
    </tr> 
    
    <tr> 
    <td style="text-indent: 45px;"> 
        Menindak lanjuti surat permohonan tempat Praktik Kerja Lapangan (PKL) 
        bagi siswa-siswi kami nomor :  423.5/423.5/0876  tanggal 23 September 2020 
        di instansi Bapak/Ibu, pada kesempatan ini kami mohon bantuan Bapak/ Ibu Pimpinan berkenan untuk 
        menerima peserta didik kami sebanyak terlampir.
    </td>
</tr>
<tr> 
    <td style="text-indent: 45px ;" >
        Sesuai dengan kalender pendidikan kami, pelaksanaan Praktik Kerja Lapangan (PKL) 
        berlangsung selama ' . $numBulan  . ' bulan, 
        terhitung mulai tanggal ' . convertDateDBtoIndo($tgl_mulai) . ' sd. ' . convertDateDBtoIndo($tgl_selesai) . ' 
        maka kami akan melakukan penarikan Praktik Kerja Lapangan (PKL) daring di instansi yang Bapak / Ibu pimpin.
    </td>
</tr>
<tr>
    <td style="text-indent: 45px ;">
    Atas bantuan dan kerjasamanya dari Bapak/Ibu Pimpinan, kami sampaikan banyak terima kasih.
    </td>
</tr>
</table>
       <div class="kp">
        Kepala Sekolah,
       </div> <br>
    
       <div class="ttd">
           <u> Drs. Dani Priya Widada</u>
            <br>
           NIP. 19680202 199412 1 005
       </div> <br><br><br><br><br><br>
       </div> 

       <div class="page_break"></div>

       <div class="container">
       <div class="l1">
           Lampiran surat Nomor : ' . $no_surat . '
       </div> <br>
       <div class="l2">
           <a class="p1">DAFTAR NAMA PESERTA PKL</a> <br>
           <a class="p2">SMK NEGERI 1 PURWOKERTO </a><br>
           <a class="p3">TAHUN 2020/2021 </a>
       </div><br>
       <table id="l3">
           <tr>
               <td> Nama Instansi</td>
               <td> : ' . $nama_iduka . '</td>
           </tr>
           <tr> 
               <td> Alamat</td>
               <td> : ' . $alamat_iduka . '</td>
           </tr>
           <tr> 
               <td> Nama Pembimbing</td>
               <td> : ' . $nama_pembimbing . '</td>
           </tr>
       </table>
       <table class="l4" width="100%" rules="all" border="1"> 
           <tr>
               <th height="35px" width="10px"> No.</th>
               <th height="35px" width="290px">Nama Peserta</th>
               <th height="35px" width="100px">Kelas</th>
               <th height="35px" width="150px">Keterangan</th>
           </tr>
           <tr>
               <td>1.</td>
               <td>' . $nama_siswa1 . '</td>
               <td>' . $kelas1 . '</td>
               <td>' . $keterangan1 . '</td>
           </tr>
           <tr>
               <td>2.</td>
               <td>' . $nama_siswa2 . '</td>
               <td>' . $kelas2 . '</td>
               <td>' . $keterangan2 . '</td>
           </tr>
           <tr>
               <td>3.</td>
               <td>' . $nama_siswa3 . '</td>
               <td>' . $kelas3 . '</td>
               <td>' . $keterangan3 . '</td>
           </tr>
           <tr>
               <td>4.</td>
               <td>' . $nama_siswa4 . '</td>
               <td>' . $kelas4 . '</td>
               <td>' . $keterangan4 . '</td>
           </tr>

           <tr>
                <td>5.</td>
                <td>' . $nama_siswa5 . '</td>
                <td>' . $kelas5 . '</td>
                <td>' . $keterangan5 . '</td>
          </tr>

        <tr>
            <td>6. </td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>7. </td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>8. </td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>9. </td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>10. </td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td>11. </td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>12. </td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>13. </td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>14. </td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td>15. </td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
            
        <tr>
            <td>16. </td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>17. </td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>18. </td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>19. </td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>20. </td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
   
       </table>
          <table id="l6">
           <tr>
               <h4 class="b"> Kontak Person  POKJA PKL :</h4>
               <td>1. Seno Nugroho, S. Kom </td>
               <td>: 085227040069</td>
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
$nama_file = 'SP-' . $nama_iduka . '.pdf';

$dompdf->loadHtml($text);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream($nama_file);
$output = $dompdf->output();

file_put_contents('../../../../../files/pkl/surat/menarik/' . $nama_file, $output);
$sql = mysqli_query($conn, "INSERT INTO 
surat(id_surat_detail, id_iduka, no_surat, tgl_surat, files) 
VALUES('4', '$iduka', '$no_surat', '$tgl_surat', '$nama_file')");
?>