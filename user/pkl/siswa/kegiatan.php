<?php include '../kit/head.php'; ?>
<?php include 'kit/nav.php'; ?>
<?php include 'api/getData.php'; ?>
<?php include '../api/bln.php'; ?>
<?php include '../api/tgl.php'; ?>
<div class="main-content-container container-fluid px-4">
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-11 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Kegiatan PKL</span>
        </div>
    </div>
    <div class="row">
        <div class="col-lg col-md-6 col-sm-6 mb-4">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <table style="width: 100%;">
                        <tr>
                            <td style="width: 65%;">
                                <a class="btn btn-primary" data-toggle="modal" data-target="#tambah" style="color: white;">Tambah Kegiatan</a>
                            </td>
                            <form method="POST" class="form-inline">
                                <td style="width: 30%;">
                                    <select name="bulan" class="form-control">
                                        <option value="">-Bulan-</option>
                                        <option value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </td>
                                <td>
                                    <button type="submit" name="filter" class="btn btn-primary">
                                        <i class="material-icons">filter_list</i>
                                    </button>
                                </td>
                            </form>
                        </tr>
                    </table>
                </div>
                <div class="card-body p-3 pb-3 mb-3" style="overflow-x:auto;">
                    <table class="table mt-3 text-center" style="min-width: 100%">
                        <tr>
                            <th style="width: 1%;">No</th>
                            <th style="width: 27%;">Tgl</th>
                            <th>Kegiatan</th>
                            <th>Relevansi Dg KK</th>
                            <th colspan="2">Aksi</th>

                        </tr>
                        <?php
                        if (!isset($_POST['filter'])) {
                            $getOldest = mysqli_query($conn, "SELECT MIN(MONTH(tgl_kegiatan)) as oldest_month FROM kegiatan WHERE nis = '$nis'");
                            $fetchOldest = mysqli_fetch_array($getOldest);
                            echo "Bulan : " . bulanIndo($fetchOldest['oldest_month']);
                            $getKegiatan = mysqli_query($conn, "SELECT *, MONTH(tgl_kegiatan) as bulan FROM kegiatan WHERE nis = '$nis' AND MONTH(tgl_kegiatan) = '" . $fetchOldest['oldest_month'] . "'");

                            $no = 1;
                            while ($value = mysqli_fetch_array($getKegiatan)) { ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $value['tgl_kegiatan']; ?></td>
                                    <td><?php echo $value['nama_kegiatan']; ?></td>
                                    <?php if ($value['relevansi'] == '1') { ?>
                                        <td>Ya</td>
                                    <?php } else if ($value['relevansi'] == '2') { ?>
                                        <td>Tidak</td>
                                    <?php } else { ?>
                                        <td>Blm terisi</td>
                                    <?php } ?>
                                    <td>
                                        <a style="color: white;" class="btn btn-primary" data-toggle="modal" data-target="#edit<?php echo $value['id_kegiatan']; ?>" data-placement="top" title="Ubah">
                                            <i class="material-icons">edit</i>
                                        </a>
                                    </td>
                                    <td>
                                        <a style="color: white;" class="btn btn-danger" data-toggle="modal" data-target="#hapus<?php echo $value['id_kegiatan']; ?>" data-placement="top" title="Hapus">
                                            <i class="material-icons">delete</i>
                                        </a>
                                    </td>
                                </tr>
                            <?php }
                        } else {
                            $bln = $_POST['bulan'];
                            $getKegiatan = mysqli_query($conn, "SELECT *, MONTH(tgl_kegiatan) as bulan FROM kegiatan WHERE nis = '$nis' AND MONTH(tgl_kegiatan) = '$bln'");

                            echo "Bulan : " . bulanIndo($bln);
                            $no = 1;
                            while ($value = mysqli_fetch_array($getKegiatan)) {
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $value['tgl_kegiatan']; ?></td>
                                    <td><?php echo $value['nama_kegiatan']; ?></td>
                                    <?php if ($value['relevansi'] == '1') { ?>
                                        <td>Ya</td>
                                    <?php } else { ?>
                                        <td>Tidak</td>
                                    <?php } ?>
                                    <td>
                                        <a style="color: white;" class="btn btn-primary" data-toggle="modal" data-target="#edit<?php echo $value['id_kegiatan']; ?>" data-placement="top" title="Ubah">
                                            <i class="material-icons">edit</i>
                                        </a>
                                    </td>
                                    <td>
                                        <a style="color: white;" class="btn btn-danger" data-toggle="modal" data-target="#hapus<?php echo $value['id_kegiatan']; ?>" data-placement="top" title="Hapus">
                                            <i class="material-icons">delete</i>
                                        </a>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php foreach ($getKegiatan as $key => $value) { ?>
    <div class="modal fade" id="export<?php echo $value['bulan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Export Kegiatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    $data = mysqli_query($conn, "SELECT siswa.nama, siswa.nis, jurusan, iduka, alamat, guru.nama as nama_pembimbing, nip FROM siswa
                                                    JOIN jurusan_detail ON siswa.id_jurusan_detail = jurusan_detail.id_jurusan_detail
                                                    JOIN guru ON siswa.nip_pembimbing = guru.nip
                                                    JOIN iduka ON siswa.id_iduka = iduka.id_iduka
                                                    WHERE nis = '$nis'");
                    $result = mysqli_fetch_array($data);
                    ?>
                    <form action="api/format_bimbingan.php" method="POST">
                        <div class="form-group">
                            <strong>
                                <p>Bulan : <?php echo bulanIndo($bln); ?></p>
                            </strong>
                            <p>Mohon lengkapi data dibawah ini.</p>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" value="<?php echo $result['nama']; ?>" class="form-control" readonly>
                            <input type="hidden" name="bulan" value="<?php echo bulanIndo($bln) ?>" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>NIS</label>
                            <input type="text" name="nis" value="<?php echo $result['nis']; ?>" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Monitoring Ke</label>
                            <input type="number" name="ke" value="<?php echo $result['nama']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="bln" value="<?php echo $bln; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="jurusan" value="<?php echo $result['jurusan']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="iduka" value="<?php echo $result['iduka']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="alamat" value="<?php echo $result['alamat']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="pembimbing" value="<?php echo $result['nama_pembimbing']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="nip" value="<?php echo $result['nip']; ?>" class="form-control">
                        </div>

                        <div class="form-group text-right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


<?php foreach ($getKegiatan as $key => $value) { ?>
    <div class="modal fade" id="edit<?php echo $value['id_kegiatan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Kegiatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="api/edit_kegiatan.php" method="POST">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?php echo $value['id_kegiatan']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nama Kegiatan</label>
                            <input type="text" name="kegiatan" value="<?php echo $value['nama_kegiatan']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Kegiatan</label>
                            <input type="date" name="tgl" value="<?php echo $value['tgl_kegiatan']; ?>" class="form-control">
                        </div>
                        <!-- <div class="form-group">
                            <label>Relevansi Dengan KK</label>
                            <select name="relevansi" class="form-control">
                                <option value="1">Ya</option>
                                <option value="2">Tidak</option>
                            </select>
                        </div> -->
                        <div class="form-group text-right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Kegiatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="api/tambah_kegiatan.php" method="POST">
                    <div class="form-group">
                        <label>NIS</label>
                        <input type="text" name="nis" value="<?php echo $_SESSION['nis']; ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Kegiatan</label>
                        <input type="text" name="kegiatan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Kegiatan</label>
                        <input type="date" name="tgl" class="form-control">
                    </div>
                    <!-- <div class="form-group">
                        <label>Relevansi Dengan KK</label>
                        <select name="relevansi" class="form-control">
                            <option value="1">Ya</option>
                            <option value="2">Tidak</option>
                        </select>
                    </div> -->
                    <div class="form-group text-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php foreach ($getKegiatan as $key => $value) { ?>
    <div class="modal fade" id="hapus<?php echo $value['id_kegiatan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Hapus Kegiatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>Apakah Anda Yakin ingin menghapus kegiatan pada <?php echo convertDateDBtoIndo($value['tgl_kegiatan']); ?>?</label>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-dark">Batal</button>
                    <a href="api/hapus_kegiatan.php?id=<?php echo $value['id_kegiatan']; ?>" class="btn btn-primary">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php include '../kit/foot.php'; ?>