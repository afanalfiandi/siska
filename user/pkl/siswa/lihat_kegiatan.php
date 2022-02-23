<?php include '../kit/head.php'; ?>
<?php include 'kit/nav.php'; ?>
<?php
include '../../api/conn.php';
include '../api/bln.php';
$nis = $_GET['nis'];
$bln = $_GET['bln'];

$sql = mysqli_query($conn, "SELECT * FROM kegiatan WHERE nis = '$nis' AND MONTH(tgl_kegiatan) = '$bln'
ORDER BY tgl_kegiatan ASC
");
?>
<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-sm-10 text-sm-left">
            <span class="text-uppercase page-subtitle">Lihat Kegiatan</span>
        </div>
        <div class="col-sm-1 text-center">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a style="color: white;" data-toggle="modal" data-target="#tambah" class="btn btn-primary btn-sm">+ Kegiatan</a>
                <a style="color: white;" data-toggle="modal" data-target="#export" class="btn btn-success btn-sm">Eksport Excel</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg col-md-6 col-sm-6 mb-4">
            <div class="card card-small mb-4 p-2">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Lihat Kegiatan</h6>
                </div>
                <div class="card-body p-0 pb-3 text-center" style="overflow-x:auto;">
                    <table class="table mb-01">
                        <thead>
                            <td>No.</td>
                            <td>Nama Kegiatan</td>
                            <td>Tgl Kegiatan</td>
                            <td>Relevansi</td>
                            <td colspan="2">Aksi</td>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($sql as $key => $value) { ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $value['nama_kegiatan']; ?></td>
                                    <td><?php echo $value['tgl_kegiatan']; ?></td>
                                    <?php if ($value['relevansi'] == '1') { ?>
                                        <td>Ya</td>
                                    <?php } else if ($value['relevansi'] == '2') { ?>
                                        <td>Tidak</td>
                                    <?php } else { ?>
                                        <td>Blm terisi</td>
                                    <?php } ?>
                                    <td>
                                        <a data-toggle="modal" data-target="#edit<?php echo $value['id_kegiatan']; ?>" class="btn btn-sm btn-primary" href="edit_kegiatan.php?id=<?php echo $value['id_kegiatan']; ?>">Edit</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-danger" style="color: white;" data-toggle="modal" data-target="#hapus<?php echo $value['id_kegiatan']; ?>">Hapus</a>
                                    </td>
                                <?php } ?>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <a href="format_bimbingan.php?nis=<?php echo $nis; ?>&&bln=<?php echo $bln; ?>">Eksport ke Excel</a> -->

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
                        <strong>
                            <p>Bulan : <?php echo bulanIndo($bln); ?></p>
                        </strong>
                    </div>
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

<?php foreach ($sql as $key => $value) { ?>
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


<?php foreach ($sql as $key => $value) { ?>
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
                    <label>Apakah Anda Yakin?</label>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-dark">Batal</button>
                    <a href="api/hapus_kegiatan.php?id=<?php echo $value['id_kegiatan']; ?>" class="btn btn-primary">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<div class="modal fade" id="export" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
<?php include '../kit/foot.php'; ?>