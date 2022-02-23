<?php include '../kit/head.php'; ?>
<?php include 'kit/nav.php'; ?>
<?php include 'api/getData.php'; ?>
<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-11 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Sertifikat PJBL</span>
        </div>
        <div class="col-12 col-sm-1 text-center text-sm-left mt-3 mb-0">
            <a href="add_bukti_monitoring.php" class="btn btn-primary">Tambah Data</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg col-md-6 col-sm-6 mb-4">
            <div class="card card-small mb-4 p-2">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Sertifikat PJBL</h6>
                </div>
                <div class="card-body p-0 pb-3 text-center" style="overflow-x:auto;">
                    <table class="table mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col" class="border-0">No. </th>
                                <th scope="col" class="border-0">Nama</th>
                                <th scope="col" class="border-0">Kelas</th>
                                <th scope="col" class="border-0">DUDI/Instansi</th>
                                <th scope="col" class="border-0">Lihat File</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($sertifikat as $key => $value) { ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $value['nama']; ?></td>
                                    <td><?php echo $value['kelas']; ?></td>
                                    <td><?php echo $value['iduka']; ?></td>
                                    <td>
                                        <!-- <a href="../../../files/pkl/bukti_monitoring/<?php echo $value['files']; ?>">
                                            Lihat
                                        </a> -->
                                        <a href="#" class="btn btn-primary"> Lihat </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php foreach ($bMonitoring as $key => $value) { ?>
    <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="keluarModalLabel">Hapus file</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <a href="api/hapus_bukti_monitoring.php?id=<?php echo $value['id_bukti_monitoring']; ?>&&file=<?php echo $value['files'] ?>" class="btn btn-primary">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php include '../kit/foot.php'; ?>