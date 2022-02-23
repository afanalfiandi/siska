<?php
include 'template/head.php';
include 'template/header.php';
$tgl_surat = date("Y-m-d");
?>
<section class="content-header">
    <h1> Halaman Buat Surat Permohonan</h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Default box -->
            <div class="box box-danger ">
                <div class="box-header with-border">
                    <h5 class="box-title"> <i class="fa fa-edit"></i> Form </h5>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="api/surat/permohonan/permohonan.php" method="GET">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Daftar Iduka</label>
                            <div class="col-sm-8">
                                <select name="iduka" class="form-control" id="iduka" onchange="changeValue(this.value)">
                                    <option value="">--- Pilih Iduka ---</option>
                                    <?php
                                    $result = mysqli_query($conn, "SELECT * FROM iduka");
                                    $jsArray = "var ditIduka = new Array();\n";
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo '<option value="' . $row['id_iduka'] . '">' . $row['iduka'] . '</option>';
                                        $jsArray .= "
                                  ditIduka['" . $row['id_iduka'] . "'] = {
                                    id:'" . addslashes($row['id_iduka']) . "'
                                      ,iduka:'" . addslashes($row['iduka']) . "'
                                      ,alamat:'" . addslashes($row['alamat']) . "'
                                  };\n";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">No Surat</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" placeholder="No Surat" name="no_surat" id="no_surat">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tanggal Surat</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" name="tgl_surat" id="tgl_surat" placeholder="<?php echo convertDateDBtoIndo("$tgl_surat") ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="id" id="id">
                            <label class="col-sm-3 control-label">Pimpinan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" placeholder="Pimpinan" name="pimpinan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nama Iduka</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" placeholder="Nama Iduka" name="nama_iduka" id="nama_iduka" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Alamat Iduka</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" placeholder="Alamat Iduka" name="alamat_iduka" id="alamat_iduka" readonly>
                            </div>
                        </div>
                        <?php for ($i = 1; $i <= 5; $i++) { ?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Kompetensi Keahlian <?php echo $i; ?></label>
                                <div class="col-sm-4">
                                    <select name="kompetensi_keahlian<?php echo $i; ?>" class="form-control">
                                        <option value="">---Pilih Kompetensi Keahlian---</option>
                                        <?php
                                        $kompetensi_keahlian = mysqli_query($conn, "SELECT * FROM jurusan_detail");
                                        foreach ($kompetensi_keahlian as $key => $value) {
                                        ?>
                                            <option value="<?php echo $value['id_jurusan_detail']; ?>"><?php echo $value['jurusan']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <label class="col-sm-2 control-label">Jml siswa</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" placeholder="jumlah" name="jml_siswa<?php echo $i; ?>" id="jml_siswa<?php echo $i; ?>">
                                </div>
                            </div>
                        <?php } ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"></label>
                            <div class="col-sm-4">
                                <label class="text-danger">* Kosongkan yang tidak perlu.</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tanggal Mulai</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" placeholder="Tanggal Mulai" name="tgl_mulai" id="tgl_mulai">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tanggal Selesai</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" placeholder="Tanggal Selesai" name="tgl_selesai" id="tgl_selesai">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Catatan</label>
                            <div class="col-sm-8">
                                <textarea name="catatan" id="catatan" cols="30" rows="5" class="form-control"></textarea>
                                </textaera>
                            </div>
                        </div>

                        <!-- PARAGRAF 1 -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Paragraf 1</label>
                            <div class="col-sm-8">
                                <textarea name="paragraf1" id="paragraf1" cols="30" rows="5" class="form-control">
                                    Berdasarkan Kurikulum 2013 hasil revisi, peserta didik pada satuan pendidikan di SMK wajib melaksanakan Praktik Kerja Lapangan (PKL) di dunia usaha/dunia industri selama .... bulan.
                                </textarea>
                            </div>
                        </div>
                        <!-- PARAGRAF 2 -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Paragraf 2</label>
                            <div class="col-sm-8">
                                <textarea name="paragraf2" id="paragraf2" cols="30" rows="5" class="form-control">
                                    Sehubungan dengan hal di atas, kami mengajukan permohonan ijin kepada Bapak untuk dapat menerima siswa-siswi dari Kompetensi Keahlian yang ada di SMK N 1 Purwokerto sebanyak terlampir untuk melaksanan Praktik Kerja Lapangan (PKL) di .... yang Bapak/Ibu pimpin.
                                </textarea>
                            </div>
                        </div>
                        <!-- PARAGRAF 3 -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Paragraf 3</label>
                            <div class="col-sm-8">
                                <textarea name="paragraf3" id="paragraf3" cols="30" rows="5" class="form-control">
                                    Adapun kegiatan Praktik Kerja Lapangan (PKL) di sekolah kami pada Tahun Pelajaran 2020/2021 akan dilaksanakan mulai tanggal .... sampai tanggal .... (sambil menunggu regulasi ijin pelaksanan PKL dari Pemerintah Kabupaten Banyumas).
                                </textarea>
                            </div>
                        </div>
                        <!-- PARAGRAF 4 -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Paragraf 4</label>
                            <div class="col-sm-8">
                                <textarea name="paragraf4" id="paragraf4" cols="30" rows="5" class="form-control">
                                    Demikian permohonan kami, atas bantuan dan kerjasamanya kami mengucapkan banyak terima kasih.
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"></label>
                            <div class="col-sm-4">
                                <label class="text-danger">* Biarkan yang tidak ubah.</label>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-sm btn-danger pull-right"><i class="fa fa-paper-plane"></i> Buat Surat</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    </div>
    <script type="text/javascript">
        <?php echo $jsArray; ?>

        function changeValue(id) {
            document.getElementById('id').value = ditIduka[id].id;
            document.getElementById('nama_iduka').value = ditIduka[id].iduka;
            document.getElementById('alamat_iduka').value = ditIduka[id].alamat;
        };
    </script>
    <!-- ./wrapper -->
    <?php include 'template/footer.php'; ?>