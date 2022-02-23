<?php include '../kit/head.php'; ?>
<?php include 'kit/nav.php'; ?>
<?php include 'api/getData.php'; ?>
<?php include '../api/bln.php'; ?>
<?php include '../api/hari.php'; ?>
<?php include '../api/tgl.php'; ?>
<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-11 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Daftar Hadir PKL</span>
        </div>
    </div>
    <div class="row">
        <div class="col-lg col-md-12 mb-4">
            <div class="card card-small mb-4 p-2">
                <div class="card-header border-bottom">
                    <table style="width: 100%;">
                        <tr>
                            <td style="width: 65%;">
                                <a class="btn btn-primary" data-toggle="modal" data-target="#tambah" style="color: white;">Tambah Kehadiran</a>
                                <a data-toggle="modal" data-target="#export" style="color: white;" class="btn btn-success">Eksport (Excel)</a>
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
                <div class="card-body py-2 pb-3" style="overflow-x:auto;">
                    <table id="tabel" class="table mb-0 mt-2 text-center">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col" class="border-0">No. </th>
                                <th scope="col" class="border-0">Hari/Tanggal</th>
                                <th scope="col" class="border-0">Kehadiran</th>
                                <th scope="col" class="border-0">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!isset($_POST['filter'])) {
                                $getOldest = mysqli_query($conn, "SELECT MIN(MONTH(tgl_kehadiran)) as oldest_month FROM kehadiran WHERE nis = '$nis'");
                                $fetchOldest = mysqli_fetch_array($getOldest);
                                $bln = $fetchOldest['oldest_month'];
                                echo "Bulan : " . bulanIndo($bln);
                                $no = 1;

                                $getData = mysqli_query($conn, "SELECT * FROM kehadiran WHERE nis = '$nis' AND MONTH(tgl_kehadiran) = '$bln' ORDER BY tgl_kehadiran ASC");
                                foreach ($getData as $key => $value) {
                                    $tgl = $value['tgl_kehadiran'];
                                    $convert_tgl = DateTime::createFromFormat('Y-m-d', $tgl);
                                    $hari = $convert_tgl->format('l');
                            ?>
                                    <tr>
                                        <td><?php echo $no++; ?>. </td>
                                        <td><?php echo hari($hari) . ", " . convertDateDBtoIndo($value['tgl_kehadiran']); ?></td>
                                        <td>
                                            <?php if ($value['id_kehadiran_detail'] == '1') { ?>
                                                Hadir
                                            <?php } else if ($value['id_kehadiran_detail'] == '2') { ?>
                                                Sakit
                                            <?php } else if ($value['id_kehadiran_detail'] == '3') { ?>
                                                Ijin
                                            <?php } else { ?>
                                                Alpa
                                            <?php } ?>
                                        </td>
                                        <td><?php echo $value['keterangan']; ?></td>
                                    </tr>
                                <?php }
                            } else {
                                $bln = $_POST['bulan'];
                                $getData = mysqli_query($conn, "SELECT *, MONTH(tgl_kehadiran) as bulan FROM kehadiran WHERE nis = '$nis' AND MONTH(tgl_kehadiran) = '$bln'");

                                echo "Bulan : " . bulanIndo($bln);
                                $no = 1;
                                while ($value = mysqli_fetch_array($getData)) {
                                    $tgl = $value['tgl_kehadiran'];
                                    $convert_tgl = DateTime::createFromFormat('Y-m-d', $tgl);
                                    $hari = $convert_tgl->format('l');
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?>. </td>
                                        <td><?php echo hari($hari) . ", " . convertDateDBtoIndo($value['tgl_kehadiran']); ?></td>
                                        <td>
                                            <?php if ($value['id_kehadiran_detail'] == '1') { ?>
                                                Hadir
                                            <?php } else if ($value['id_kehadiran_detail'] == '2') { ?>
                                                Sakit
                                            <?php } else if ($value['id_kehadiran_detail'] == '3') { ?>
                                                Ijin
                                            <?php } else { ?>
                                                Alpa
                                            <?php } ?>
                                        </td>
                                        <td><?php echo $value['keterangan']; ?></td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg col-md-12 mb-4">
            <div class="card card-small mb-4 p-2">
                <div class="card-header text-left">
                    <span>Daftar Hadir (Excel)</span>
                </div>
                <div class="card-body py-2 pb-3" style="overflow-x:auto;">
                    <table class="table mb-1">
                        <tr>
                            <th>No.</th>
                            <th>Bulan</th>
                            <th>File</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
                        $getDoc = mysqli_query($conn, "SELECT * FROM daftar_hadir WHERE nis = '$nis'");
                        foreach ($getDoc as $key => $value) {
                            $no = 1;
                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo bulanIndo($value['bulan']); ?></td>
                                <td>
                                    <a href="../../../files/pkl/daftar_hadir/<?php echo $value['files']; ?>">
                                        Lihat
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-danger" data-toggle="modal" data-target="#hapus<?php echo $value['id_daftar_hadir']; ?>" style="color: white;">
                                        <i class="material-icons">delete</i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="hapusModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="keluarModalLabel">Tambah Kehadiran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="api/kehadiran.php" method="POST">
                    <div class="form-group">
                        <label>NIS</label>
                        <input type="text" name="nis" value="<?php echo $nis; ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tgl" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Kehadiran</label> <br>
                        <?php
                        $getKehadiran = mysqli_query($conn, "SELECT * FROM kehadiran_detail ORDER BY id_kehadiran_detail ASC");
                        foreach ($getKehadiran as $key => $value) {
                        ?>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kehadiran" id="<?php echo $value['id_kehadiran_detail']; ?>" value="<?php echo $value['id_kehadiran_detail']; ?>">
                                <label class="form-check-label"><?php echo $value['kehadiran']; ?></label>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="keterangan" class="form-control" cols="30" rows="5"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="export" tabindex="-1" role="dialog" aria-labelledby="hapusModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="keluarModalLabel">Export Daftar Hadir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="api/daftar_hadir.php" method="POST">
                    <?php
                    $getSiswa = mysqli_query($conn, "SELECT siswa.nama, siswa.nis, jurusan, iduka, alamat, guru.nama as nama_pembimbing, nip,kelas FROM siswa
                    JOIN jurusan_detail ON siswa.id_jurusan_detail = jurusan_detail.id_jurusan_detail
                    JOIN guru ON siswa.nip_pembimbing = guru.nip
                    JOIN iduka ON siswa.id_iduka = iduka.id_iduka
                    JOIN kelas_detail ON siswa.id_kelas_detail = kelas_detail.id_kelas_detail
                    WHERE nis = '$nis'");
                    $fetch = mysqli_fetch_array($getSiswa);
                    ?>
                    <div class="form-group">
                        <label>Mohon Lengkapi Data Dibawah Ini</label>
                        <label class="text-danger">Perhatian : Data yang telah di eksport tidak bisa diubah</label>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="nama" value="<?php echo $fetch['nama']; ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="nis" value="<?php echo $fetch['nis']; ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="kelas" value="<?php echo $fetch['kelas']; ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="jurusan" value="<?php echo $fetch['jurusan']; ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="iduka" value="<?php echo $fetch['iduka']; ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="pembimbing" value="<?php echo $fetch['nama_pembimbing']; ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="nip" value="<?php echo $fetch['nip']; ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Bulan</label>
                        <select name="bulan" class="form-control">
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php foreach ($getDoc as $key => $value) { ?>
    <div class="modal fade" id="hapus<?php echo $value['id_daftar_hadir']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                    <button data-dismiss="modal" class="btn btn-dark">Batal</button>
                    <a href="api/hapus_daftar_hadir.php?id=<?php echo $value['id_daftar_hadir']; ?>" class="btn btn-primary">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php include '../kit/foot.php'; ?>
<script>
    $(document).ready(function() {
        $('#tabel').DataTable();
    });
</script>