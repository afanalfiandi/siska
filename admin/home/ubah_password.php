<?php 
    include 'template/head.php';
    include 'template/header.php';
    $sql = mysqli_query($conn, "SELECT * FROM admin where nip = '$nip'");
    $row = mysqli_fetch_array($sql);
?>
<section class="content-header">
    <h1> Ubah Password </h1>
</section>
<section class="content">
    <a href="profil.php" class="btn btn-warning btn-sm ">
        <i class="fa fa-reply"></i> Kembali</a>
    <p></p>
    <div class="row">
        <div class="col-md-12">
            <!-- Profile Image -->
            <div class="box box-danger">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="assets/img/<?php echo $row['img']; ?>" alt="User profile picture">
                    <h3 class="profile-username text-center"><?php echo $row['nama'] ?></h3>
                    <ul class="list-group list-group-unbordered">
                        <form class="form-horizontal" action="api/ubah_password.php" method="POST">
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">NIP :</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="nip" id="nip" readonly value="<?php echo $row['nip']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Nama :</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" value="<?php echo $row['nama']; ?>" name="nama" id="nama" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Password Lama</label>
                                    <div class="col-sm-4">
                                        <input type="password" class="form-control" placeholder="Password Lama" name="pass_lama" id="pass_lama">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Password Baru</label>
                                    <div class="col-sm-4">
                                        <input type="password" class="form-control" placeholder="Password Baru" name="pass_baru" id="pass_baru">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label"></label>
                                    <div class="col-sm-4">
                                        <button type="submit" class="btn btn-danger btn-block"> Simpan</button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </form>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
<?php include 'template/footer.php'; ?>