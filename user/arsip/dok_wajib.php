<?php
include 'kit/head.php';
include 'kit/nav-side.php';
$getJenis = mysqli_query($conn, "SELECT * FROM dokumen_wajib_detail ORDER BY jenis_dokumen ASC");
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
                                <button data-toggle="modal" data-target="#upload-wajib" class="btn btn-sm btn-primary">
                                    <i class="fas fa-plus me-2 ms-0"></i>
                                    Upload
                                </button>
                            </div>
                        </div>

                    </div>
                    <div class="card-body px-4 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center text-start mb-3 text-xl">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-center text-primary font-weight-bolder opacity-10">No.</th>
                                        <th class="text-uppercase text-primary font-weight-bolder opacity-10 ps-2">Jenis Dokumen</th>
                                        <th class="text-uppercase text-primary font-weight-bolder opacity-10 ps-2">Tanggal Upload</th>
                                        <th class="text-uppercase text-primary font-weight-bolder opacity-10 ps-2">Status</th>
                                        <th colspan="2" class="text-uppercase text-center text-primary font-weight-bolder opacity-10 ps-2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($getJenis as $key => $value) {
                                        $sql = mysqli_query($conn, "SELECT* FROM dokumen_wajib WHERE nip = '$nip' AND id_dokumen_wajib_detail = '" . $value['id_dokumen_wajib_detail'] . "'");
                                        $row  = mysqli_fetch_array($sql);
                                    ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no++; ?></td>
                                            <?php if (!isset($row['id_dokumen'])) { ?>
                                                <td class="text-uppercase text-primary font-weight-bolder opacity-10 ps-2">
                                                    <?php echo $value['jenis_dokumen']; ?>
                                                </td>
                                                <td class="text-center">-</td>
                                                <td>
                                                    <i class="fas fa-times text-danger">Belum Diupload</i>
                                                </td>
                                                <td>
                                                    <button data-toggle="modal" data-target="#ubah-wajib<?php echo $value[`id_dokumen`]; ?>" class="btn btn-primary" disabled>Ubah</button>
                                                </td>
                                                <td>
                                                    <button href="" class="btn btn-danger" disabled>Hapus</button>
                                                </td>
                                        </tr>
                                    <?php } else { ?>
                                        <td class="text-uppercase text-primary font-weight-bolder opacity-10 ps-2">
                                            <a href="../../files/arsip/wajib/<?php echo $row['files']; ?>" target="_blank">
                                                <?php echo $value['jenis_dokumen']; ?>
                                            </a>
                                        </td>
                                        <td class="text-center"><?php echo convertDateDBtoIndo($row['tgl_upload']); ?></td>
                                        <td>
                                            <i class="fas fa-check text-primary">Sudah Diupload</i>
                                        </td>
                                        <td>
                                            <button data-toggle="modal" data-target="#ubah-wajib<?php echo $row['id_dokumen']; ?>" class="btn btn-primary">Ubah</button>
                                        </td>
                                        <td>
                                            <button href="" class="btn btn-danger" data-toggle="modal" data-target="#hapus-wajib<?php echo $row['id_dokumen']; ?>">Hapus</button>
                                        </td>
                                <?php }
                                        } ?>
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