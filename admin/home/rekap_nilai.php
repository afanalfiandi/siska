<?php
include 'template/head.php';
include 'template/header.php';
$data = mysqli_query($conn, "SELECT * FROM siswa
JOIN kelas_detail ON siswa.id_kelas_detail = kelas_detail.id_kelas_detail
JOIN jurusan_detail ON siswa.id_jurusan_detail = jurusan_detail.id_jurusan_detail
");
$kompetensi_keahlian = mysqli_query($conn, "SELECT * FROM jurusan_detail");
?>
<section class="content-header">
    <h1> Nilai PJBL </h1>
</section>
<!-- Main content -->
<section class="content">
    <button type="button" class="btn btn-sm btn-success pull-center" data-toggle="modal" data-target="#export_excel">
        <i class="fa fa-file-excel-o"></i> Export To Excel
    </button>
    <p></p>
    <!-- Default box -->
    <div class="box box-danger ">
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example" width="2000px" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th rowspan="3"> NO </th>
                        <th rowspan="3"> NIS </th>
                        <th rowspan="3"> NAMA </th>
                        <th rowspan="3"> KOMPETENSI KEAHLIAN </th>
                        <th rowspan="3"> NAMA PROJECT </th>
                        <th rowspan="3"> KELAS </th>
                        <th colspan="5"> NILAI </th>
                        <th rowspan="3"> KETERANGAN </th>
                        <th rowspan="3"> ACTION </th>
                    </tr>
                    <tr>
                        <th> PERENCANAAN</th>
                        <th> PELAKSANAAN</th>
                        <th> LAPORAN</th>
                        <th>SIKAP</th>
                        <th>AKHIR</th>
                    </tr>
                    <tr>
                        <th> 20%</th>
                        <th> 40%</th>
                        <th> 30%</th>
                        <th> 10%</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php foreach ($data as $key => $value) {
                        $sql = mysqli_query($conn, "SELECT * FROM nilai_pjbl WHERE nis = '" . $value['nis'] . "'");
                        $row = mysqli_fetch_array($sql);

                        if (
                            (!isset($row['nama_project'])) ||
                            (!isset($row['nilai_perencanaan'])) ||
                            (!isset($row['nilai_pelaksanaan'])) ||
                            (!isset($row['nilai_laporan'])) ||
                            (!isset($row['nilai_sikap'])) ||
                            (!isset($row['nilai_akhir'])) ||
                            (!isset($row['keterangan']))
                        ) {
                            $nama_projek = ' ';
                            $nilai_perencanaan = ' ';
                            $nilai_pelaksanaan = ' ';
                            $nilai_laporan = ' ';
                            $nilai_sikap = ' ';
                            $nilai_akhir = ' ';
                            $keterangan = ' ';
                            $disabled = 'disabled';
                        } else {
                            $nama_projek = $row['nama_project'];
                            $nilai_perencanaan = $row['nilai_perencanaan'];
                            $nilai_pelaksanaan = $row['nilai_pelaksanaan'];
                            $nilai_laporan = $row['nilai_laporan'];
                            $nilai_sikap = $row['nilai_sikap'];
                            $nilai_akhir = $row['nilai_akhir'];
                            $keterangan = $row['keterangan'];
                            $disabled = ' ';
                        }
                    ?>
                        <tr>
                            <td><?php echo $nomor++; ?></td>
                            <td><?php echo $value['nis'] ?></td>
                            <td><?php echo $value['nama'] ?></td>
                            <td><?php echo $value['jurusan'] ?></td>
                            <td class="text-center"><?php echo $nama_projek; ?></td>
                            <td><?php echo $value['kelas'] ?></td>
                            <td class="text-center text-danger"><b><?php echo $nilai_perencanaan; ?></b></td>
                            <td class="text-center text-warning"><b><?php echo $nilai_pelaksanaan; ?></b></td>
                            <td class="text-center text-primary"><b><?php echo $nilai_laporan; ?></b></td>
                            <td class="text-center text-success"><b><?php echo $nilai_sikap; ?></b></td>
                            <td class="text-center text-info"><b><?php echo $nilai_akhir; ?></b></td>
                            <td class="text-center"><b><?php echo $keterangan; ?></b></td>
                            <td class="text-center">
                                <!-- <button type="button" class="btn btn-xs btn-info " data-toggle="modal" data-target="#input<?php echo $value['nis'] ?>">
                                    <i class="fa fa-pencil-square" data-toggle="tooltip" data-placement="bottom" title="INPUT"></i>
                                </button> -->
                                <a href="buat_sertifikat.php?nis=<?php echo $value['nis']; ?>" type="button" class="btn btn-xs btn-danger" <?php echo $disabled; ?>>
                                    <i class="fa fa-credit-card" data-toggle="tooltip" data-placement="bottom" title="BUAT SERTIFIKAT"> </i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <!--- Modal Delete --->
    <?php foreach ($data as $key => $value) { 
        $getNilai = mysqli_query($conn, "SELECT * FROM nilai_pjbl WHERE nis ='" . $value['nis'] . "'");
        $fetch = mysqli_fetch_array($getNilai);
?>
        <!-- The modal input nilai-->
        <div class="modal fade" id="input<?php echo $value['nis'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabelSmall" aria-hidden="true">
            <div class="modal-dialog modal-lg ">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="modalLabelSmall"><b><i class="fa fa-plus-square fa-lg"></i> FORM INPUT NILAI</b></h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" action="api/nilai_pjbl/input_nilai.php" method="POST">
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">NIS</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="<?php echo $value['nis'] ?>" name="nis" readonly>
                                        <input type="hidden" class="form-control" value="<?php echo $fetch['keterangan'] ?>" name="ket" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nama</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="<?php echo $value['nama'] ?>" name="nama" id="nama" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Kompetensi Keahlian</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="<?php echo $value['jurusan'] ?>" name="kompetensi_keahlian" id="kompetensi_keahlian" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Kelas</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="<?php echo $value['kelas'] ?>" name="kelas" id="kelas" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nama Project</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nama_project" id="nama_project" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nilai Perencanaan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nilai_perencanaan" id="nilai_perencanaan" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nilai Pelaksanan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nilai_pelaksanaan" id="nilai_pelaksanaan" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nilai Laporan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nilai_laporan" id="nilai_laporan" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nilai Sikap</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nilai_sikap" id="nilai_sikap" required>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Simpan </button>
                            </div>
                            <!-- /.box-footer -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="modal fade" id="export_excel" tabindex="-1" role="dialog" aria-labelledby="modalLabelSmall" aria-hidden="true">
        <div class="modal-dialog modal-sm ">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="modalLabelSmall"><b><i class="fa fa-file-excel-o fa-lg"></i> FORM EXPORT EXCEL</b></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="api/export-xls.php" method="POST">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Kompetensi Keahlian</label>
                                <div>
                                    <select class="form-control" name="kompetensi_keahlian" id="kompetensi_keahlian" required>
                                        <option value="">---Pilih Kompetensi Keahlian---</option>
                                        <?php
                                        foreach ($kompetensi_keahlian as $a => $value) {
                                            echo "<option value='" . $value['id_jurusan_detail'] . "'>" . $value['jurusan'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tahun</label>
                                <div>
                                    <input type="text" class="form-control" name="tahun" id="nilai_sikap" required>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-file-excel-o"></i> Export </button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ./wrapper -->
    <?php include 'template/footer.php'; ?>