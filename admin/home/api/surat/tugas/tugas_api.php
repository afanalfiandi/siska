<?php
include '../../../../api/conn.php';
include('../../library/tgl_indo/lib.php');
include '../../library/hari_indo/lib.php';
require_once("../../library/dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$iduka = $_GET['iduka'];
$nama_iduka = $_GET['nama_iduka'];
$dasar = $_GET['dasar'];
$no_surat = $_GET['no_surat'];
$nama_pengantar = $_GET['nama_pengantar'];
$pangkat = $_GET['pangkat'];
$kompetensi_keahlian = $_GET['kompetensi_keahlian'];
$nip = $_GET['nip'];
$gol = $_GET['gol'];
$jabatan = $_GET['jabatan'];
$kegiatan = $_GET['kegiatan'];
$waktu_mulai = $_GET['waktu_mulai'];
$waktu_selesai = $_GET['waktu_selesai'];
$alamat = $_GET['alamat'];
$tgl_terima = $_GET['tgl_terima'];
$tanggal_tugas = $_GET['tanggal_tugas'];
$tgl_surat = $_GET['tgl_surat'];
$catatan = $_GET['catatan'];
$tahun_diterima = $_GET['tahun_diterima'];
$convert_tgl_tugas = DateTime::createFromFormat('Y-m-d', $tanggal_tugas);
$hari_tgl_tugas = $convert_tgl_tugas->format('l');
$hasil_tgl_tugas = hariIndo($hari_tgl_tugas); 


if ($kegiatan == '1')
{
    $keg = 'Monitoring I';
} 
else if($kegiatan == '2')
{
    $keg = 'Monitoring II';
}
else if($kegiatan == '3')
{
    $keg = 'Mengantar surat permohonan PKL';
}
else if($kegiatan == '4')
{
    $keg = 'Mengantar peserta didik PKL';
}
else if($kegiatan == '5')
{
    $keg = 'Penarikan peserta didik PKL';
}
else {
    $keg = '6';
}

$text = '<html>';
$text .= '
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style type="text/css">
    @font-face {
        font-family: RockWell;
        src: url("font/ROCCB___.TTF");
    }
  
        #kop_surat {
            text-align: center;
            width: 100%;
        }
        .img{
            position: absolute;
            height: 80%;
            width: 95%;
            margin-left:10%;
            z-index: 1;
        }

        #a {
            font-size: 17px;
        }
        #a1{
            font-size:14px;
        }

        #b {
            font-family: "Rockwell Condensed";
            font-size: 17px;
            font-weight:bold;
        }

        #c {
            font-size: 11px;
        }

        .first-line {
            height: 1.5px;
            background-color: black;
        }

        .second-line {
            margin-top: 2px;
            height: 2.5px;
            background-color: black;
        }

        #tittle {
            text-align: center;
        }

        #tittle, h3 {
            text-align: center;
            font-size: 18px;
        }

        #no_surat {
            padding-top: -2%;
            font-style: normal;
            text-align: center;
            font-size: 15px;
        }

        .content table {
            width: 20%;
            padding-top:5%;
        }

        .content h3 {
            text-align: left;
            margin-left:13%;
            padding-top:-9;
            font-family: "Times New Roman";
        }
        .content h4 {
            font-family: "Times New Roman";
            text-align: left;
            margin-left:13%;
            padding-top:1.5%;
        }

        #petugas {
            padding-top:-4;
            width: 100%; 
        }

        #tujuan {
            width: 80%;
            padding-top:3%;
        }
        #signature {
            width: 100%;
        }
        .page_break {page-break-before: always;}

        /* lembar 2 */

        
        .hasil{
            margin-top: -20%;
        }
        .p{
            margin-left: 70%;
            padding-top: -50px;
        }
        
        .pp{
            margin-left: 70%;
            padding-top: 5%; 
        }
       
    </style>
</head>

<body>
    
<div class="container">

        <table id="kop_surat" >
            <tr>
                <td rowspan="12" style="width: 153px; ">
                    <img class="img" src="../../../assets/img/img.jpg" >
                </td>

                <tr id="a">
                    <td> <strong>PEMERINTAH PROVINSI JAWA TENGAH</strong></td>
                </tr>
                <tr id="a1">
                    <td><strong>DINAS PENDIDIKAN DAN KEBUDAYAAN</strong></td>
                </tr>
                <tr id="b">
                    <td><strong>SEKOLAH MENENGAH KEJURUAN NEGERI 1</strong></td>
                </tr>
                <tr id="b">
                    <td><strong>PURWOKERTO</strong></td>
                </tr>
                 
                <tr id="c">
                    <td>Jalan Dr. Soeparno No. 29 Telepon (0281) 637132 PURWOKERTO</td>
                </tr>
                <tr id="c">
                    <td>Website : www.smk1purwokerto.sch.id     Email : admin@ smkn1purwokerto@yahoo.sch.id</td>
                </tr>
            </tr>
        </table>
        <div class="first-line"></div>
        <div class="second-line"></div>
    
        <div id="title">
            <h3><u>SURAT TUGAS</u></h3>
            <p id="no_surat">Nomor : ' . $no_surat . '</p>
        </div>
        
        <div class="content">
            <table>
                <tr>
                    <td>Dasar</td>
                    <td> : ' . $dasar . ' </td>
                </tr>
            </table>
            
            <h3> Kepala SMK Negeri 1 Purwokerto dengan ini :</h3>
            <h4> MENUGASKAN :</h4>
            
            <table id="petugas">
                <tr>
                    <td>Kepada</td>
                    <td> Nama</td>
                    <td>: ' . $nama_pengantar . '</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Pangkat / Gol </td>
                    <td>: '. $pangkat .  ' / ' . $gol . '</td>
                </tr>
                <tr>
                    <td></td>
                    <td>NIP</td>
                    <td>: ' . $nip . '</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Jabatan </td>
                    <td>: ' . $jabatan . '  SMK Negeri 1 Purwokerto</td>
                </tr>
            </table>
            
            <table id="tujuan">
                <tr>
                    <td>Untuk melaksanakan :</td>
                </tr>
                <tr>
                    <td> Kegiatan</td>
                    <td>: '. $keg . ' </td>
                </tr>
                <tr>
                    <td class="kk">Kompetensi Keahlian </td>
                    <td class="kkk"> : '. $kompetensi_keahlian .'</td>
                </tr>
                <tr>
                    <td>Hari / Tanggal</td>
                    <td>: ' . $hasil_tgl_tugas .', ' . convertDateDBtoIndo($tanggal_tugas) . '</td>
                </tr>
                <tr>
                    <td>Waktu :</td>
                    <td>: ' . $waktu_mulai . ' - ' . $waktu_selesai .'</td>
                </tr>
                <tr>
                    <td>Tempat </td>
                    <td>: ' . $nama_iduka . '</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: ' . $alamat . '</td>
                </tr>
                <tr>
                    <td>Catatan </td>
                    <td>: ' . $catatan . '</td>
                </tr>
            </table>
            
            <table id="signature">
                <tr>
                    <td>Telah sampai dan diterima</td>
                    <td>Ditetapkan di Purwokerto</td>
                </tr>
                <tr>
                    <td>Hari, tanggal : ................................. ' .$tahun_diterima. '</td>
                    <td>Pada Tanggal : ' . convertDateDBtoIndo($tgl_surat) . '</td>
                </tr>
                <tr>
                    <td>Mengetahui,</td>
                    <td>Kepala Sekolah</td>
                </tr>
                
            </table>
        
            <table id="signature">
                <tr>
                    <td><u>.............................................</u></td>
                    <td>Drs. Dani Priya Widada</td>
                </tr>
                <tr>
                    <td></td>
                    <td>NIP. 19680202 199412 1 005</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="page_break"></div>
        
    <div class="container> 
    <div>
    <h3 class="jdl"> LAPORAN PELAKSANAAN PERINTAH TUGAS</h3>
    </div>
        <table id="lp" width="100%" rules="all" border="2" cellpadding="7">
            <tr>
                <td height="25px" width="200px">Hari/Tanggal</td>
                <td width="300px">&nbsp;</td>
                
            </tr>
            <tr>
                <td height="25px">Tempat Tujuan</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td height="50px">&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td >Pegawai yang <br> melaksanakan <br> perjalanan <br> Dinas</td>
                <td height="100px">
                    <a> 1. </a> <br>
                    <a> 2. </a><br>
                    <a> 3. </a><br>
                    <a> 4. </a>

                </td>
            </tr>
            <tr>
                <td  height="450px">
                <p class="hasil">Hasil</p>  
                </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td height="120px" colspan="2">
                    <p class="mk"> Mengetahui; <br> Kepala Sekolah</p>
                    <p class="p"> ...........,.............................. <br> Pembuat laporan,</p>
                    <p class="pp"> ..........................................<br> NIP.</p>
                </td>
              </tr>
    </Table>
    </div>

</body>
';
$text .= "</html>";
$dompdf->loadHtml($text);

$dompdf->setPaper('A4', 'potrait');
$dompdf->render();


$dompdf->stream('ST-'. $keg . '-' . $nama_iduka . '.pdf');
$nama_file = 'ST-'. $keg . '-' . $nama_iduka . '.pdf';
$output = $dompdf->output();
file_put_contents('../../../../../files/pkl/surat/tugas/' . $nama_file, $output);
$sql = mysqli_query($conn, "INSERT INTO 
surat(id_surat_detail, id_iduka, no_surat, tgl_surat, files) 
VALUES('2', '$iduka', '$no_surat', '$tgl_surat', '$nama_file')");

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