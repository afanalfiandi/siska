<?php include '../kit/head.php'; ?>
<?php include 'kit/nav.php'; ?>
<?php include 'api/getData.php';
$getSiswa = mysqli_query($conn, "SELECT * FROM siswa WHERE nis = '" . $_SESSION['nis'] . "'");
$row = mysqli_fetch_array($getSiswa);

if (!isset($row['nip_pembimbing'])) { ?>
    <script>
        location.replace('form/');
    </script>
<?php } else if (!isset($row['id_iduka'])) { ?>
    location.replace('form/');
<?php } ?>
<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-11 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Profil Saya</span>
        </div>
    </div>
    <div class="row">
        <div class="col-lg col-md-6 mb-4">
            <div class="card card-small mb-4 p-2">
                <!-- <div class="card-header border-bottom">
                    <h6 class="m-0">Sertifikat</h6>
                </div> -->
                <div class="card-body pb-3" style="overflow-x:auto;">
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-6 text-center">
                            <?php if (!isset($_SESSION['img'])) { ?>
                                <img style="border: 4px solid #eaeaea; box-shadow: 1px 1px #eaeaea;" class="user-avatar rounded-circle mr-2" data-toggle="modal" data-target="#fotoProfil" height="100" width="100" src="../../../files/img/profil/default.png">
                            <?php } else { ?>
                                <img style="border: 4px solid #eaeaea; box-shadow: 1px 1px #eaeaea;" class="user-avatar rounded-circle mr-2" data-toggle="modal" data-target="#fotoProfil" height="100" width="100" src="../../../files/img/profil/<?php echo $_SESSION['img']; ?>">
                            <?php } ?>
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-4">
                            <?php $fetchUser = mysqli_fetch_array($getUser); ?>
                            <form action="api/ubah_profil.php" method="POST">
                                <div class="form-group">
                                    <label>NIS</label>
                                    <input type="text" name="nis" value="<?php echo $fetchUser['nis']; ?>" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" value="<?php echo $fetchUser['nama']; ?>" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Kelas</label>
                                    <input type="text" name="kelas" value="<?php echo $fetchUser['kelas']; ?>" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Nama Pembimbing</label>
                                    <input type="text" name="nama_pembimbing" value="<?php echo $fetchUser['nama_pembimbing']; ?>" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>DUDI/Instansi</label>
                                    <input type="text" name="iduka" value="<?php echo $fetchUser['iduka']; ?>" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <a href="#" class="btn btn-block btn-primary" data-toggle="modal" data-target="#ubahProfil">Ubah Profil</a>
                                </div>
                                <div class="form-group">
                                    <a href="#" data-toggle="modal" data-target="#ubahPassword" class="btn btn-block btn-primary">Ubah Password</a>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-4">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="fotoProfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Ubah Foto Profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="api/foto_profil.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Foto Profil</label>
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <?php if (!isset($_SESSION['img'])) { ?>
                                <img class="user-avatar rounded-circle" height="100" width="100" src="../../../files/img/profil/default.png">
                            <?php } else { ?>
                                <img class="user-avatar rounded-circle" height="100" width="100" src="../../../files/img/profil/<?php echo $_SESSION['img']; ?>">
                            <?php } ?>
                        </div>
                        <input type="hidden" name="nis" value="<?php echo $fetchUser['nis']; ?>" class="mt-3 form-control">
                        <input type="file" name="img" class="mt-3 form-control">
                        <span class="text-danger text-left" style="font-size: 0.8em;">*(png, jpg, jpeg) max. 5 MB</span>
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
<div class="modal fade" id="ubahProfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Ubah Profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="api/ubah_profil.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Foto Profil</label>
                    </div>
                    <!-- <div class="form-group">
                        <div class="text-center">
                            <?php if (!isset($_SESSION['img'])) { ?>
                                <img class="user-avatar rounded-circle" height="100" width="100" src="../../../files/img/profil/default.png">
                            <?php } else { ?>
                                <img class="user-avatar rounded-circle" height="100" width="100" src="../../../files/img/profil/<?php echo $_SESSION['img']; ?>">
                            <?php } ?>
                        </div>
                        <input type="file" name="img" class="mt-3 form-control">
                        <span class="text-danger text-left" style="font-size: 0.8em;">*(png, jpg, jpeg) max. 5 MB</span>
                    </div> -->
                    <div class="form-group">
                        <label>NIS</label>
                        <input type="text" name="nis" value="<?php echo $fetchUser['nis']; ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" value="<?php echo $fetchUser['nama']; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Kelas</label>
                        <select name="kelas" class="form-control">
                            <?php foreach ($kelas as $key => $value) { ?>
                                <option value="<?php echo $value['id_kelas_detail'] ?>"><?php echo $value['kelas'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Pembimbing</label>
                        <select style="width: 100%;" name="nama_pembimbing" class="form-control siswa-ubahprofil">
                            <?php foreach ($guru as $key => $value) { ?>
                                <option value="<?php echo $value['nip']; ?>"><?php echo $value['nama']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>DUDI/Instansi</label>
                        <select name="iduka" style="width: 100%;" class="form-control siswa-ubahprofil">
                            <?php foreach ($dudi as $key => $value) { ?>
                                <option value="<?php echo $value['id_iduka']; ?>"><?php echo $value['iduka']; ?></option>
                            <?php } ?>
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

<div class="modal fade" id="ubahPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Ubah Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="api/ubah_password.php" method="POST">
                    <div class="form-group">
                        <input type="hidden" name="nis" value="<?php echo $fetchUser['nis']; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password Lama</label>
                        <input type="password" name="lama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password Baru</label>
                        <input type="password" name="baru" class="form-control">
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

<script>
    $(".siswa-ubahprofil").select2({
        dropdownParent: $('#ubahProfil')
    });
</script>