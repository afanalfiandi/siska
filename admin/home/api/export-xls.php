<html>
<head>
	<title>Export Nilai PKL</title>
</head>
<body>
	<style type="text/css">
    @font-face {
        font-family: 'times';
        src: url('font/times.ttf');
    }
	body{
		font-family: 'times';
        
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
    th{
        text-align: center;
    }
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;
 
	}
	a {
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>
 
	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Nilai PJBL.xls");
	?>
<div class="container" style="background-color: #C0DAD9;">
<h2 style="text-align: center;">FORMAT PENILAIAN PKL PJBL <br> TAHUN AJARAN 2020/2021</h2>
	<table border="1" >
        <thead >
            <tr style="background-color: #002060; color: white;">
                <th rowspan="3"> NO </th>
                <th rowspan="3" style=" width:'100px';"> NIS </th>
                <th rowspan="3" style=" width:'400px';"> NAMA </th>
                <th rowspan="3" style=" width:'400px';"> KOMPETENSI KEAHLIAN </th>
                <th rowspan="3" style=" width:'300px';"> NAMA PROJECT </th>
                <th rowspan="3" style=" width:'100px';"> KELAS </th>
                <th colspan="5"> NILAI </th>
                <th rowspan="3" style=" width:'300px';"> KETERANGAN </th>
               
            </tr>
            <tr style="background-color: #002060; color: white;">
                <th style=" width:'150px';">PERENCANAAN</th>
                <th style=" width:'150px';">PELAKSANAAN</th>
                <th style=" width:'150px';">LAPORAN</th>
                <th style=" width:'150px';">SIKAP</th>
                <th style=" width:'150px';">AKHIR</th>

            </tr>
            <tr style="background-color: #002060; color: white;">
                <th> 20%</th>
                <th> 40%</th>
                <th> 30%</th>
                <th> 10%</th>
                <th> </th>
            </tr>
        </thead>
		<tbody>
        <?php 
		
		$koneksi = mysqli_connect("localhost","root","","siska");
 
		$tahun = $_POST['tahun'];
        $kompetensi_keahlian = $_POST['kompetensi_keahlian'];
		$data = mysqli_query($koneksi,"SELECT nilai_pkl.nis, siswa.nama, kompetensi_keahlian_detail.kompetensi_keahlian,
         nilai_pkl.nama_project, kelas_detail.kelas, nilai_project_perencanaan, nilai_project_pelaksanaan , 
         nilai_project_laporan, nilai_project_sikap, nilai_project_akhir, keterangan
        FROM nilai_pkl
        JOIN kompetensi_keahlian_detail ON nilai_pkl.id_kompetensi_keahlian_detail = kompetensi_keahlian_detail.id_kompetensi_keahlian_detail
        JOIN siswa ON nilai_pkl.nis = siswa.nis
        JOIN kelas_detail ON siswa.id_kelas = kelas_detail.id_kelas
        WHERE tahun_pkl = '$tahun' AND kompetensi_keahlian_detail.id_kompetensi_keahlian_detail = '$kompetensi_keahlian'
        ");
		$no = 1;
		while($d = mysqli_fetch_array($data)){
		?>
		<tr style="background-color: #C0DAD9;">
			<td  style="text-align: center;"><?php echo $no++; ?></td>
			<td style="text-align: center;"><?php echo $d['nis']; ?></td>
			<td><?php echo $d['nama']; ?></td>
			<td><?php echo $d['kompetensi_keahlian']; ?></td>
            <td><?php echo $d['nama_project']; ?></td>
            <td  style="text-align: center;"><?php echo $d['kelas']; ?></td>
            <td style="text-align: center;"><?php echo $d['nilai_project_perencanaan']; ?></td>
            <td style="text-align: center;"><?php echo $d['nilai_project_pelaksanaan']; ?></td>
            <td style="text-align: center;"><?php echo $d['nilai_project_laporan']; ?></td>
            <td style="text-align: center;"><?php echo $d['nilai_project_sikap']; ?></td>
            <td style="text-align: center;"><?php echo $d['nilai_project_akhir']; ?></td>
            <td style="text-align: center;"><?php echo $d['keterangan']; ?></td>
		</tr>
		<?php 
		}
		?>
        </tbody>
	</table>
</div>
</body>
</html>