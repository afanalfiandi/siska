<?php include '../kit/head.php'; ?>
<?php include 'kit/nav.php'; ?>
<?php include 'api/getData.php'; ?>
<?php include '../api/bln.php'; ?>
<?php include '../api/tgl.php'; ?>
<?php

// $blnKegiatan = mysqli_query($conn, "SELECT DISTINCT MONTH(tgl_kegiatan) as bulan FROM kegiatan 
// WHERE nis = '$nis'
// ORDER BY tgl_kegiatan ASC");
// $getFile = mysqli_query($conn, "SELECT * FROM format_bimbingan WHERE nis = '$nis'");
?>

<div class="main-content-container container-fluid px-4">

    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-11 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Format Bimbingan</span>
        </div>
        <!-- <div class="col-12 col-sm-1 text-center text-sm-left">
            <a class="btn btn-primary" data-toggle="modal" data-target="#tambah" style="color: white;">+ Kegiatan</a>
        </div> -->
    </div>
    <div class="row">
        <div class="col-lg col-md-6 col-sm-6 mb-4">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <table style="width: 100%;">
                        <tr>
                            <td style="width: 65%;">
                                <a class="btn btn-success" data-toggle="modal" data-target="#export" style="color: white;">Buat Dokumen (Excel)</a>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="card-body p-3 pb-3 mb-3" style="overflow-x:auto;">
                    <?php
                    $getFb = mysqli_query($conn, "SELECT * FROM format_bimbingan 
                    WHERE nis = '$nis' 
                    ORDER BY MONTH(tgl_mulai)");
                    ?>
                    <table class="table mt-3 text-center" style="min-width: 100%">
                        <tr>
                            <th>No.</th>
                            <th>Tgl Kegiatan</th>
                            <th>File</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
                        $no = 1;
                        foreach ($getFb as $key => $value) { ?>
                            <tr>
                                <td><?php echo $no++; ?>.</td>
                                <td><?php echo  convertDateDBtoIndo($value['tgl_mulai']); ?> - <?php echo convertDateDBtoIndo($value['tgl_akhir']); ?> </td>
                                <td>
                                    <a href="../../../files/pkl/format_bimbingan/<?php echo $value['files']; ?>">
                                        Lihat File
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-danger" style="color: white;" data-toggle="modal" data-target="#hapus<?php echo $value['id_format_bimbingan']; ?>">
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
                        <p class="mb-0">Mohon lengkapi data dibawah ini.</p>
                        <p class="text-danger">Perhatian : Data yang telah di eksport tidak bisa diubah</p>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" value="<?php echo $result['nama']; ?>" class="form-control" readonly>
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
                        <label>Tanggal Mulai</label>
                        <input type="date" name="tgl_mulai" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Akhir</label>
                        <input type="date" name="tgl_akhir" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="text-danger">*maksimal 31 hari</label>
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

<?php foreach ($getFb as $key => $value) { ?>
    <div class="modal fade" id="hapus<?php echo $value['id_format_bimbingan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Hapus Format Bimbingan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus file format bimbingan?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-dark" data-dismiss="modal">Batal</button>
                    <a href="api/hapus_format_bimbingan.php?id=<?php echo $value['id_format_bimbingan']; ?>" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php include '../kit/foot.php'; ?>