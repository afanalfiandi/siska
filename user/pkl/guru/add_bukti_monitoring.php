<?php include '../kit/head.php'; ?>
<?php include 'kit/nav.php'; ?>
<?php include 'api/getData.php'; ?>
<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-11 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Tambah Bukti Monitoring</span>
        </div>
        <!-- <div class="col-12 col-sm-1 text-center text-sm-left mt-3 mb-0">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">Tambah Data</button>
        </div> -->
    </div>
    <div class="row">
        <div class="col-lg col-md-6 col-sm-6 mb-4">
            <div class="card card-small mb-4 p-2">
                <div class="card-body p-0 pb-3 text-center" style="overflow-x:auto;">
                    <form id="msform" method="POST" action="api/bukti_monitoring.php">
                        <fieldset>
                            <h2 class="fs-title">Pelaksanaan Monitoring</h2>
                            <div class="form-card">
                                <div class="form-group">
                                    <label>Kompetensi Keahlian</label>
                                    <select name="jurusan" class="form-control" required>
                                        <?php foreach ($jurusan as $key => $value) { ?>
                                            <option value="<?php echo $value['id_jurusan_detail']; ?>"><?php echo $value['jurusan']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-card">
                                <div class="form-group">
                                    <label>Monitoring Ke</label>
                                    <!-- <select name="ke" class="form-control" required>
                                        <?php for ($i = 1; $i <= 5; $i++) { ?>
                                            <option value="<?php echo $i; ?>">Ke - <?php echo $i; ?></option>
                                        <?php } ?>
                                    </select> -->
                                    <input type="number" name="ke" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-card">
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <input type="date" name="tgl_monitoring" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-card">
                                <div class="form-group">
                                    <label>Nama DUDI</label>
                                    <!-- <select name="nama_dudi" class="form-control">
                                        <?php foreach ($dudi as $key => $value) { ?>
                                            <option value="<?php echo $value['id_iduka']; ?>"><?php echo $value['iduka']; ?></option>
                                        <?php } ?>
                                    </select> -->
                                    <select name="nama_dudi" class="form-control" onchange="changeValue(this.value)" required>
                                        <?php
                                        $result = mysqli_query($conn, "SELECT * FROM iduka ORDER BY iduka ASC");
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
                            <div class="form-card">
                                <div class="form-group">
                                    <label>Alamat DUDI</label>
                                    <input type="text" class="form-control" name="alamat" id="alamat" required readonly>
                                </div>
                            </div>
                            <div class="form-card">
                                <div class="form-group">
                                    <label>Guru Pelaksana Monitoring</label>
                                    <input type="hidden" name="nip" class="form-control" value="<?php echo $_SESSION['nip']; ?>" required>
                                    <input type="text" name="guru" class="form-control" value="<?php echo $_SESSION['nama']; ?>" required readonly>
                                </div>
                            </div>
                            <button type="button" name="next" class="btn btn-primary next" value="Next Step">Selanjutnya ></button>
                        </fieldset>

                        <!-- Peserta Didik -->
                        <fieldset>
                            <h2 class="fs-title">Data Peserta Didik</h2>
                            <div class="form-group">
                                <select name="peserta" style="width: 100%;" class="form-control select_peserta" required>
                                    <option value=""></option>
                                    <?php foreach ($siswa as $key => $value) { ?>
                                        <option value="<?php echo $value['nis']; ?>"><?php echo $value['nama']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <table style="width: 100%;" class="field_wrapper">
                                    <tr>
                                        <td style='width: 65%;'>
                                            <input type='text' class='form-control' name='kegiatan[]' value='' placeholder='Kegiatan PKL' required />
                                        </td>
                                        <td>
                                            <select name='relevansi[]' class='form-control' required>
                                                <option value=''>Relevansi Dengan KK</option>
                                                <option value='Ya'>Ya</option>
                                                <option value='Tidak'>Tidak</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="form-group text-center">
                                <a href='javascript:void(0);' class="btn btn-primary" id='add_button' title='Add field'>+</a>
                            </div>
                            <hr>
                            <div class="form-group" id="container">
                            </div>
                            <input type="button" name="previous" class="btn btn-success previous" value="Kembali" />
                            <input type="button" name="next" class="btn btn-primary next" value="Selanjutnya" />

                        </fieldset>

                        <!-- Saran dan Ulasan -->
                        <fieldset>
                            <h2 class="fs-title">Saran dan Ulasan Peserta Didik</h2>
                            <div class="form-group saran_wrapper">
                                <div class='row'>
                                    <div class='col-sm-4 mt-1 mb-1'>
                                        <input type="text" class="form-control" name="kegiatan_saran[]" placeholder="Kegiatan">
                                    </div>
                                    <div class='col-sm-4 mt-1 mb-1'>
                                        <input type="text" class="form-control" name="saran[]" placeholder="Saran/Masukan">
                                    </div>
                                    <div class='col-sm-4 mt-1 mb-1'>
                                        <!-- <input type="text" class="form-control" name="catatan[]" placeholder="Catatan"> -->
                                        <textarea name='catatan[]' placeholder='Catatan' class='form-control' cols='30' rows='1'></textarea>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="form-group text-center">
                                <a href='javascript:void(0);' class="btn btn-primary" id='add_saran' title='Add field'>+</a>
                            </div>
                            <input type="button" name="previous" class="btn btn-success previous" value="Kembali" />
                            <input type="submit" class="btn btn-primary next" value="Simpan" />
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../kit/foot.php'; ?>