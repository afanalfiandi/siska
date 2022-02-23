<?php include '../kit/head.php'; ?>
<?php include 'kit/nav.php'; ?>
<?php include 'api/getData.php'; ?>
<?php include '../api/bln.php'; ?>
<?php include '../api/tgl.php';
$nis = $_GET['nis'];
$nama = $_GET['nama'];
?>
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
                            <td style="width: 70%;">
                                <label>Nama Siswa : <?php echo $nama; ?></label>
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
                            <th>Aksi</th>
                        </tr>
                        <?php
                        if (!isset($_POST['filter'])) {
                            $getOldest = mysqli_query($conn, "SELECT MIN(MONTH(tgl_kegiatan)) as oldest_month FROM kegiatan 
                            JOIN siswa ON kegiatan.nis = siswa.nis
                            JOIN guru ON siswa.nip_pembimbing  = guru.nip
                            WHERE siswa.nis = '$nis'");
                            $fetchOldest = mysqli_fetch_array($getOldest);
                            echo "Bulan : " . bulanIndo($fetchOldest['oldest_month']);

                            $getKegiatan = mysqli_query($conn, "SELECT *, MONTH(tgl_kegiatan) as bulan FROM kegiatan 
                                                                JOIN siswa ON kegiatan.nis = siswa.nis
                                                                JOIN guru ON siswa.nip_pembimbing = guru.nip
                                                                WHERE siswa.nis = '$nis' AND MONTH(tgl_kegiatan) = '" . $fetchOldest['oldest_month'] . "'");

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
                                        <a href="#" data-toggle="modal" data-target="#edit<?php echo $value['id_kegiatan']; ?>" class="btn btn-primary">Ubah</a>
                                    </td>
                                </tr>
                            <?php }
                        } else {
                            $bln = $_POST['bulan'];
                            $getKegiatan = mysqli_query($conn, "SELECT *, MONTH(tgl_kegiatan) as bulan FROM kegiatan 
                            JOIN siswa ON kegiatan.nis = siswa.nis
                            JOIN guru ON siswa.nip_pembimbing = guru.nip
                            WHERE siswa.nis = '$nis' AND MONTH(tgl_kegiatan) = '$bln'");

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
                                    <?php } else if ($value['relevansi'] == '2') { ?>
                                        <td>Tidak</td>
                                    <?php } else { ?>
                                        <td>Blm terisi</td>
                                    <?php } ?>
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#edit<?php echo $value['id_kegiatan']; ?>" class="btn btn-primary">Ubah</a>
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
<?php include '../kit/foot.php'; ?>


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
                            <input type="hidden" name="nis" value="<?php echo $value['nis']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nama Kegiatan</label>
                            <input type="text" name="kegiatan" value="<?php echo $value['nama_kegiatan']; ?>" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Kegiatan</label>
                            <input type="date" name="tgl" value="<?php echo $value['tgl_kegiatan']; ?>" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Relevansi Dengan KK</label>
                            <select name="relevansi" class="form-control">
                                <option value="1">Ya</option>
                                <option value="2">Tidak</option>
                            </select>
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