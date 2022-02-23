<?php
include 'template/head.php';
include 'template/header.php';
$nis = $_GET['nis'];
$data = mysqli_query($conn, "SELECT * FROM nilai_pjbl
    JOIN siswa ON nilai_pjbl.nis = siswa.nis
    JOIN jurusan_detail ON siswa.id_jurusan_detail = jurusan_detail.id_jurusan_detail
    JOIN kelas_detail ON siswa.id_kelas_detail = kelas_detail.id_kelas_detail
    WHERE siswa.nis = '$nis'");
$row = mysqli_fetch_array($data);
?>

<section class="content-header">
    <h1> Cetak Sertifikat </h1>
</section>

<!-- Main content -->
<section class="content">
    <a href="rekap_nilai.php" type="button" class="btn btn-warning btn-sm ">
        <i class="fa fa-reply"></i> Kembali
    </a>
    <p></p>
    <!--- Start Content--->
    <div class="row">
        <div class="col-md-12">
            <div class="box box-danger ">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form class="form-horizontal" action="api/sertifikat/sertifikat_api.php" method="GET">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">No Sertifikat</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="" name="no_sertifikat">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Jenis PKL</label>
                                    <div class="col-sm-8">
                                        <select name="jenis_pkl" id="" class="form-control" required>
                                            <option value="">---Pilih Jenis PKL---</option>
                                            <option value="1">PRAKTIK KERJA LAPANGAN BERBASIS PROJECT</option>
                                            <option value="2">PRAKTIK KERJA LAPANGAN</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Nama Siswa</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="<?php echo $row['nama'] ?>" name="nama_siswa" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">NIS</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="<?php echo $row['nis'] ?>" name="nis" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Nama Project</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="<?php echo $row['nama_project'] ?>" name="nama_project" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Kompetensi Keahlian</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="<?php echo $row['jurusan'] ?>" name="kompetensi_keahlian" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Nama Project</label>

                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="<?php echo $row['nama'] ?>" name="nama" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Tgl Mulai</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" name="tgl_mulai">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Tgl Selesai</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" name="tgl_selesai">
                                    </div>
                                </div>
                            </div>
                            <!--- form kanan --->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Tgl Sertifikat</label>
                                    <div class="col-sm-7">
                                        <input type="date" class="form-control" name="tgl_sertif">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Nilai Perencanaan</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" value="<?php echo $row['nilai_perencanaan'] ?>" name="nilai_perencanaan" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Nilai Pelaksanaan</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" value="<?php echo $row['nilai_pelaksanaan'] ?>" name="nilai_pelaksanaan" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Nilai Laporan Proyek</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" value="<?php echo $row['nilai_laporan'] ?>" name="nilai_lap_proyek" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Nilai Sikap</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" value="<?php echo $row['nilai_sikap'] ?>" name="nilai_sikap" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-2">
                                        <input type="hidden" class="form-control" value="<?php echo $row['nilai_akhir'] ?>" name="nilai_akhir" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-danger pull-right"><i class="fa fa-cloud-download"></i> Cetak Sertifikat</button>
                        </div>
                        <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>
    <!--- End Content--->
    <?php include 'template/footer.php'; ?>