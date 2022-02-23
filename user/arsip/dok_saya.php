<?php
include 'kit/head.php';
include 'kit/nav-side.php';
?>

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <?php include 'kit/nav-head.php'; ?>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-sm-10">
                                <h6>Data</h6>
                            </div>
                            <div class="col-sm-2 text-end">
                                <button data-toggle="modal" data-target="#upload-saya" class="btn btn-sm btn-primary">
                                    <i class="fas fa-plus me-2 ms-0"></i>
                                    Upload
                                </button>
                            </div>
                        </div>

                    </div>
                    <div class="card-body px-4 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center text-start mb-0 text-xl">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-primary font-weight-bolder text-center opacity-10">No.</th>
                                        <th class="text-uppercase text-primary font-weight-bolder opacity-10 ps-2">Nama Dokumen</th>
                                        <th class="text-uppercase text-primary font-weight-bolder opacity-10 ps-2">Tanggal Upload</th>
                                        <th colspan="2" class="text-uppercase text-center text-primary font-weight-bolder opacity-10 ps-2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach ($getSaya as $key => $value) { ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no++; ?></td>
                                            <td>
                                                <a href="../../files/arsip/saya/<?php echo $value['files']; ?>" target="_blank">
                                                    <span>
                                                        <i class="fas fa-folder text-primary">
                                                            <?php echo $value['nama_dokumen']; ?>
                                                        </i>
                                                    </span>
                                                </a>
                                            </td>
                                            <td>
                                                <?php echo convertDateDBtoIndo($value['tgl_upload']); ?>
                                            </td>
                                            <td class="text-center">
                                                <button data-toggle="modal" data-target="#ubah-saya<?php echo $value['id_dokumen']; ?>" class="btn btn-sm btn-primary">
                                                    Ubah</button>
                                            </td>
                                            <td class="text-center">
                                                <button data-toggle="modal" data-target="#hapus-saya<?php echo $value['id_dokumen']; ?>" class="btn btn-sm btn-danger">
                                                    Hapus</button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'kit/nav-foot.php'; ?>
</main>
<?php include 'kit/foot.php'; ?>