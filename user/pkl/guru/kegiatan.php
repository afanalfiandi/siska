<?php include '../kit/head.php'; ?>
<?php include 'kit/nav.php'; ?>
<?php include 'api/getData.php'; ?>
<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-11 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Kegiatan PKL</span>
        </div>
    </div>
    <div class="row">
        <div class="col-lg col-md-6 col-sm-6 mb-4">
            <div class="card card-small mb-4 p-2">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Kegiatan PKL</h6>
                </div>
                <div class="card-body p-0 pb-3 text-center" style="overflow-x:auto;">
                    <table class="table mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col" class="border-0">No. </th>
                                <th scope="col" class="border-0">NIS</th>
                                <th scope="col" class="border-0">Nama</th>
                                <th scope="col" class="border-0">DUDI/Instansi</th>
                                <th scope="col" colspan="2" class="border-0">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($siswaBimbingan as $key => $value) { ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $value['nis']; ?></td>
                                    <td>
                                        <a href="lihat_kegiatan.php?nis=<?php echo $value['nis']; ?>&&nama=<?php echo $value['nama']; ?>">
                                            <?php echo $value['nama']; ?>
                                        </a>
                                    </td>
                                    <td><?php echo $value['iduka']; ?></td>
                                    <td>
                                        <a href="lihat_kegiatan.php?nis=<?php echo $value['nis'] ?>&&nama=<?php echo $value['nama']; ?>" class="btn btn-outline-primary">Lihat Kegiatan</a>
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
<?php include '../kit/foot.php'; ?>