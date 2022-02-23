<?php
include 'template/head.php';
include 'template/header.php';
$kompetensi_keahlian = mysqli_query($conn, "SELECT * FROM jurusan_detail");
?>
<section class="content-header">
    <h1> Halaman Buat Surat Tugas </h1>
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
                    <form class="form-horizontal" action="api/surat/tugas/tugas_api.php" method="GET">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">No Surat</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="" name="no_surat" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Dasar</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="" name="dasar" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Nama Pengantar</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="" name="nama_pengantar" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Pangkat</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="" name="pangkat" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Gol</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="gol" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">NIP </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="nip" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Jabatan</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="jabatan" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Kegiatan</label>
                                        <div class="col-sm-8">
                                            <select name="kegiatan" id="kegiatan" class="form-control">
                                                <option value="1">Monitoring I</option>
                                                <option value="2">Monitoring II</option>
                                                <option value="3">Mengantar surat permohonan PKL</option>
                                                <option value="4">Mengantar peserta didik PKL</option>
                                                <option value="5">Penarikan peserta didik PKL</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Waktu Mulai</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" placeholder="Contoh : 09.00" name="waktu_mulai" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Waktu Selesai</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" placeholder="Contoh : 11.00" name="waktu_selesai" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Daftar Iduka</label>
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
                                                        iduka:'" . addslashes($row['iduka']) . "'
                                                        ,alamat:'" . addslashes($row['alamat']) . "'
                                                    };\n";
                                                }
                                                ?>
                                            </select>
                                            <input type="hidden" class="form-control" name="nama_iduka" id="nama_iduka" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Kompetensi Keahlian</label>
                                        <div class="col-sm-8">
                                            <select name="kompetensi_keahlian" id="kompetensi_keahlian" class="form-control">
                                                <option value="0">Pilih Kompetensi Keahlian</option>
                                                <?php while ($row = mysqli_fetch_array($kompetensi_keahlian)) {
                                                    echo "<option value='" . $row['jurusan'] . "'> " . $row['jurusan'] . "</option>";
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Tanggal Tugas </label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control" name="tanggal_tugas" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Tahun Diterima</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="tahun_diterima" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Alamat</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="alamat" id="alamat" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Catatan</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="catatan" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Tanggal Penerimaan</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control" name="tgl_terima" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Tanggal Surat</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control" name="tgl_surat">
                                            <!-- <input type="text" class="form-control" name="id" id="id" required> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-sm btn-danger pull-right"><i class="fa fa-paper-plane"></i> Buat SUrat </button>
                        </div>
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
            document.getElementById('nama_iduka').value = ditIduka[id].iduka;
            document.getElementById('alamat').value = ditIduka[id].alamat;
        };
    </script>