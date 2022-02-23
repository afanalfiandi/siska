<?php include '../kit/head.php'; ?>
<?php include 'kit/nav.php'; ?>
<?php include 'api/getData.php'; ?>
<style>
    #nis:first-child,
    td:first-child {
        position: sticky;
        left: 0px;
        background-color: #fff;
    }

    #nama {
        width: 18rem;
    }

    table {
        background-color: #fff;
    }

    th,
    td {
        border: 1px solid #eaeaea;
    }
</style>
<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-11 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Nilai PJBL</span>
        </div>
        <!-- <div class="col-12 col-sm-1 text-center text-sm-left mt-3 mb-0">
            <a href="add_bukti_monitoring.php" class="btn btn-primary">Tambah Data</a>
        </div> -->
    </div>
    <div class="row">
        <div class="col-lg col-md-6 col-sm-6 mb-4">
            <div class="card card-small mb-4 p-2">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Nilai PJBL</h6>
                </div>
                <div class="card-body p-0 pb-3 text-center" style="overflow-x:auto;">
                    <table id="example" class="table mb-2" style="min-width: 149%;">
                        <thead class="head">
                            <tr>
                                <th style="border: 1px solid #eaeaea;" id="nis" rowspan="3"> NIS </th>
                                <th id="nama" rowspan="3"> Nama </th>
                                <th rowspan="3"> Kompetensi Keahlian </th>
                                <th rowspan="3"> Kelas </th>
                                <th rowspan="3"> Nama Project </th>
                                <th colspan="5"> Nilai </th>
                                <th rowspan="3"> Keterangan </th>
                                <th rowspan="3"> Aksi </th>
                            </tr>
                            <tr>
                                <th>PERENCANAAN</th>
                                <th>PELAKSANAAN</th>
                                <th>LAPORAN</th>
                                <th>SIKAP</th>
                                <th rowspan="2">AKHIR</th>
                            </tr>
                            <tr>
                                <th> 20%</th>
                                <th> 40%</th>
                                <th> 30%</th>
                                <th> 10%</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $nomor = 1; ?>
                            <?php
                            $sql = mysqli_query($conn, "SELECT * FROM siswa 
                            WHERE nip_pembimbing = '" . $_SESSION['nip'] . "'");

                            foreach ($sql as $key => $value) { ?>
                                <tr>
                                    <td id="nistd"><?php echo $value['nis'] ?></td>
                                    <td><?php echo $value['nama'] ?></td>
                                    <td><?php echo $value['jurusan'] ?></td>
                                    <td class="text-center"><?php echo $value['kelas'] ?></td>

                                    <?php
                                    $getNilai = mysqli_query($conn, "SELECT * FROM nilai_pjbl WHERE nis = '" . $value['nis'] . "'");
                                    $vnilai = mysqli_fetch_array($getNilai);
                                    if (
                                        (!isset($vnilai['nama_project'])) ||
                                        (!isset($vnilai['nilai_perencanaan'])) ||
                                        (!isset($vnilai['nilai_pelaksanaan'])) ||
                                        (!isset($vnilai['nilai_laporan'])) ||
                                        (!isset($vnilai['nilai_sikap'])) ||
                                        (!isset($vnilai['keterangan'])) ||
                                        (!isset($vnilai['nilai_akhir']))
                                    ) {
                                        $vproject = "(kosong)";
                                        $vperencanaan = 0;
                                        $vpelaksanaan = 0;
                                        $vlaporan = 0;
                                        $vsikap = 0;
                                        $vakhir = 0;
                                        $vketerangan = "(kosong)";
                                    } else {
                                        $vproject = $vnilai['nama_project'];
                                        $vperencanaan = $vnilai['nilai_perencanaan'];
                                        $vpelaksanaan = $vnilai['nilai_pelaksanaan'];
                                        $vlaporan = $vnilai['nilai_laporan'];
                                        $vsikap = $vnilai['nilai_sikap'];
                                        $vakhir = $vnilai['nilai_akhir'];
                                        $vketerangan = $vnilai['keterangan'];
                                    }
                                    ?>
                                    <td class="text-center"><?php echo $vproject; ?></td>
                                    <td class="text-center"><b><?php echo $vperencanaan; ?></b></td>
                                    <td class="text-center"><b><?php echo $vpelaksanaan; ?></b></td>
                                    <td class="text-center"><b><?php echo $vlaporan; ?></b></td>
                                    <td class="text-center"><b><?php echo $vsikap; ?></b></td>
                                    <td class="text-center"><b><?php echo $vakhir; ?></b></td>
                                    <td class="text-center"><?php echo $vketerangan; ?></td>
                                    <td class="text-center">
                                        <?php if (!isset($vnilai['nilai_akhir'])) { ?>
                                            <a type="button" data-toggle="modal" data-target="#beri<?php echo $value['nis'] ?>">
                                                <button class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Beri Nilai">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </a>
                                        <?php } else { ?>
                                            <a type="button" data-toggle="modal" data-target="#edit<?php echo $value['nis'] ?>">
                                                <button class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Ubah Nilai">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </a>
                                        <?php

                                        } ?>
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

<!-- beri nilai-->
<?php foreach ($sql as $key => $value) { ?>
    <div class="modal fade" id="beri<?php echo $value['nis'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Beri Nilai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="api/nilai.php" method="POST">
                        <div class="form-group">
                            <label>NIS</label>
                            <input type="text" class="form-control" value="<?php echo $value['nis'] ?>" name="nis" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" value="<?php echo $value['nama'] ?>" name="nama" readonly>
                        </div>
                        <div class="form-group">
                            <label>Kompetensi Keahlian</label>
                            <input type="text" class="form-control" value="<?php echo $value['jurusan'] ?>" name="kompetensi_keahlian" readonly>
                        </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <input type="text" class="form-control" value="<?php echo $value['kelas'] ?>" name="kelas" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama Project</label>
                            <input type="text" class="form-control" name="nama_project" required>
                        </div>
                        <div class="form-group">
                            <label>Nilai Perencanaan</label>
                            <input type="text" class="form-control" name="nilai_perencanaan" required>
                        </div>
                        <div class="form-group">
                            <label>Nilai Pelaksanan</label>
                            <input type="text" class="form-control" name="nilai_pelaksanaan" required>
                        </div>
                        <div class="form-group">
                            <label>Nilai Laporan</label>
                            <input type="text" class="form-control" name="nilai_laporan" required>
                        </div>
                        <div class="form-group">
                            <label>Nilai Sikap</label>
                            <input type="text" class="form-control" name="nilai_sikap" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- edit nilai-->
<?php foreach ($nilai as $key => $value) { ?>
    <div class="modal fade" id="edit<?php echo $value['nis'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabelSmall" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Beri Nilai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="api/edit_nilai.php" method="POST">
                        <div class="form-group">
                            <label>NIS</label>
                            <input type="text" class="form-control" value="<?php echo $value['nis'] ?>" name="nis" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" value="<?php echo $value['nama'] ?>" name="nama" readonly>
                        </div>
                        <div class="form-group">
                            <label>Kompetensi Keahlian</label>
                            <input type="text" class="form-control" value="<?php echo $value['jurusan'] ?>" name="kompetensi_keahlian" readonly>
                        </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <input type="text" class="form-control" value="<?php echo $value['kelas'] ?>" name="kelas" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama Project</label>
                            <input type="text" class="form-control" value="<?php echo $value['nama_project'] ?>" name="nama_project" required>
                        </div>
                        <div class="form-group">
                            <label>Nilai Perencanaan</label>
                            <input type="text" class="form-control" value="<?php echo $value['nilai_perencanaan'] ?>" name="nilai_perencanaan" required>
                        </div>
                        <div class="form-group">
                            <label>Nilai Pelaksanan</label>
                            <input type="text" class="form-control" value="<?php echo $value['nilai_pelaksanaan'] ?>" name="nilai_pelaksanaan" required>
                        </div>
                        <div class="form-group">
                            <label>Nilai Laporan</label>
                            <input type="text" class="form-control" value="<?php echo $value['nilai_laporan'] ?>" name="nilai_laporan" required>
                        </div>
                        <div class="form-group">
                            <label>Nilai Sikap</label>
                            <input type="text" class="form-control" value="<?php echo $value['nilai_sikap'] ?>" name="nilai_sikap" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php include '../kit/foot.php'; ?>