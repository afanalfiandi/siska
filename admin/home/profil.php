<?php
include 'template/head.php';
include 'template/header.php';
$sql = mysqli_query($conn, "SELECT * FROM admin where nip = '$nip'");
$row = mysqli_fetch_array($sql);


?>
<section class="content-header">
    <h1> Profil </h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Profile Image gg -->
            <div class="box box-danger">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="assets/img/<?php echo $row['img']; ?>">
                    <h3 class="profile-username text-center"></h3>
                    <ul class="list-group list-group-unbordered">
                        <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                            <p class="text-muted text-center">
                                <button class="btn btn-xs btn-success " type="button" data-toggle="modal" data-target="#gantifile"><i class="fa fa-image" data-toggle="tooltip" data-placement="bottom" title="Ubah Foto"></i><b> </b></button>
                                <a class="btn btn-xs btn-danger " href="api/hapus_profil.php"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="bottom" title="Hapus Foto"></i><b> </b></a>
                            </p>
                            <div class="box-body">
                                
                                <div class="form-group">
                                    <label class="col-sm-4 control-label"> NIP :</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" value="<?php echo $nip; ?>" name="nip" id="nip" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Nama :</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" value="<?php echo $nama; ?>" name="nama" id="nama" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Kompetensi Keahlian :</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" value="Rekayasa Perangkat lunak" name="pimpinan" id="pimpinan" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label"></label>
                                    <div class="col-sm-4">
                                        <a href="ubah_password.php" class="btn btn-danger btn-block"><b>Ubah Password</b></a>
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
<div class="modal fade" id="gantifile" tabindex="-1" role="dialog" aria-labelledby="modalLabelSmall" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="modalLabelSmall"> <i class="fa fa-edit"></i> Ganti Foto Profil</h4>
            </div>
            <form action="api/ubah_profil.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label>File</label>
                        <input type="file" name="img" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</a>
                        <button type="submit" class="btn btn-sm btn-primary pull-right"><i class="fa fa-save"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include 'template/footer.php'; ?>