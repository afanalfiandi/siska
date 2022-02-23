<?php
include 'template/head.php';
include 'template/header.php';
$kompKeahlian = mysqli_query($conn, "SELECT * FROM jurusan_detail");
$kelas = mysqli_query($conn, "SELECT * FROM kelas_detail");
?>
<section class="content-header">
    <h1> Halaman Buat Surat Mengantar </h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Default box -->
            <div class="box box-danger ">
                <div class="box-header with-border">
                    <h3 class="box-title"> <i class="fa fa-edit"></i> Form </b></h3>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form class="form-horizontal" action="api/surat/mengantar/mengantar_api.php" method="GET">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">No Surat</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="" name="no_surat" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Lampiran</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="" name="lampiran" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Hal</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="" name="hal" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label"> Iduka</label>
                                        <div class="col-sm-8">
                                            <select name="iduka" class="form-control" id="iduka" onchange="changeValue(this.value)">
                                                <option value="">--- Pilih Iduka ---</option>
                                                <?php
                                                $result = mysqli_query($conn, "select * from iduka");
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
                                    <input type="hidden" name="id_iduka" id="id_iduka">
                                    <input type="hidden" name="nama_iduka" id="nama_iduka">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Pimpinan Iduka</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="" name="pimpinan" id="pimpinan" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Alamat Iduka</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="alamat_iduka" id="alamat_iduka" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Tanggal Mulai </label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control" name="tgl_mulai" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Tanggal Selesai</label>
                                        <div class="col-sm-8">
                                        <input type="date" class="form-control" name="tgl_selesai" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Pembimbing</label>
                                        <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nama_pembimbing" required>
                                        </div>
                                    </div>

                                    <?php for ($i=1; $i<=5; $i++) { ?>
                                    <h5 style="text-align: center; font-weight:bold;" class="text-danger"> ============= Peserta PKL <?php echo  $i; ?>  =============</h5>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Nama Siswa</label>
                                            <div class="col-sm-8">
                                            <input type="text" class="form-control" name="nama_siswa<?php echo  $i; ?>" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Kompetensi Keahlian</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="kompetensi_keahlian<?php echo $i; ?>" id="">
                                                    <option value="">--- Pilih Kompetensi Keahlian---</option>
                                                        <?php foreach ($kompKeahlian as $key => $value) { ?>
                                                             <option value="<?php echo $value['id_jurusan_detail'] ?>"><?php echo $value['jurusan'] ?></option>
                                                        <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Kelas</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="kelas<?php echo $i; ?>" id="">
                                                    <option value="">--Pilih Kelas---</option>
                                                    <?php foreach ($kelas as $key => $value) { ?>
                                                        <option value="<?php echo $value['kelas'] ?>"><?php echo $value['kelas'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Keterangan</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="keterangan<?php echo $i; ?>" >    
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="box-footer">
                            <button type="submit" class="btn btn-sm btn-danger pull-right"><i class="fa fa-paper-plane"></i> Buat SUrat </button>
                        </div>
                                </div>
                                
                            </div>
                        </div>
                        <!-- /.box-body -->
                        
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    </div>
    <!-- ./wrapper -->
    <?php include 'template/footer.php'; ?>
    <script type="text/javascript">
        <?php echo $jsArray; ?>
        function changeValue(id) {
            document.getElementById('id_iduka').value = ditIduka[id].id;
            document.getElementById('nama_iduka').value = ditIduka[id].iduka;
            document.getElementById('alamat_iduka').value = ditIduka[id].alamat;
        };
    </script>
</html>