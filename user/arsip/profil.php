<?php
include 'kit/head.php';
include 'kit/nav-side.php';
?>

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <?php include 'kit/nav-head.php'; ?>
    <div class="container-fluid">
        <div class="row">            
            <div class="col-lg-6    " style="margin-left: auto; margin-right: auto;">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-sm-10">
                                <h6>Profil</h6>
                            </div>
                        </div>

                    </div>
                    <div class="card-body px-4 pt-0 pb-2">
                        <form action="">
                            <div class="form-group">
                                <label>NIP</label>
                                <input type="text" value="<?php echo $nip; ?>" name="" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" value="<?php echo $nama; ?>" name="" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <a data-toggle="modal" data-target="#ubahProfil" style="width: 100%;" class="btn btn-primary">Ubah Profil</a>
                            </div>
                            <div class="form-group">
                                <a style="width: 100%;" data-toggle="modal" data-target="#ubahPw" class="btn btn-primary">Ubah Password</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'kit/nav-foot.php'; ?>
</main>
<?php include 'kit/foot.php'; ?>