<?php 
    include 'template/head.php';
    include 'template/header.php';
    include 'api/library/encryption/encrypt.php';
    $data = mysqli_query($conn, "SELECT *, guru.nama as nama_pembimbing, siswa.nama as nama_siswa FROM siswa 
    LEFT JOIN jurusan_detail ON siswa.id_jurusan_detail= jurusan_detail.id_jurusan_detail
    LEFT JOIN kelas_detail ON siswa.id_kelas_detail = kelas_detail.id_kelas_detail
    LEFT JOIN guru ON siswa.nip_pembimbing = guru.nip
    LEFT JOIN iduka ON siswa.id_iduka = iduka.id_iduka ORDER BY nis ASC");
    $kompetensi_keahlian = mysqli_query($conn, "SELECT * FROM jurusan_detail");
    $kelas = mysqli_query($conn, "SELECT * FROM kelas_detail");
    $iduka = mysqli_query($conn, "SELECT * FROM iduka");
?>
<section class="content-header">
    <h1> Data Peserta Didik </h1>
</section>
<!-- Main content -->
<section class="content">
    <a type="button" class="btn btn-success btn-sm " data-toggle="modal" data-target="#import">
        <i class="fa fa-cloud-download"></i> Import Data
    </a>
    <a href="panduan/siswa.xlsx" class="btn btn-warning btn-sm">
        <i class="fa fa-cloud-download"></i> Download Template 
    </a>
    <button type="button" class="btn btn-danger btn-sm btn-rounded" data-toggle="modal" data-target="#upload">
        <i class="fa fa-plus-square"></i> Add Data</button>
    <p></p>
    <!-- Default box -->
    <div class="box box-danger ">
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama </th>
                        <th>Kelas</th>
                        <th>Kompetensi Keahlian</th>
                        <th>Nama Pembimbing</th>
                        <th>Iduka</th>
                        <th width="60px;" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php foreach ($data as $key => $value) { ?>
                        <tr>
                            <td><?php echo $nomor++; ?></td>
                            <td><?php echo $value['nis'] ?></td>
                            <td><?php echo $value['nama_siswa'] ?></td>
                            <td><?php echo $value['kelas'] ?></td>
                            <td><?php echo $value['jurusan'] ?></td>
                            <td><?php echo $value['nama_pembimbing'] ?></td>
                            <td><?php echo $value['iduka'] ?></td>                            
                            <td class="text-center">
                                <button type="button" class="btn btn-xs btn-success " data-toggle="modal" data-target="#gantidata<?php echo $value['nis'] ?>">
                                    <i class="fa fa-pencil-square" data-toggle="tooltip" data-placement="bottom" title="EDIT"></i>
                                </button>
                                <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete<?php echo $value['nis']; ?>">
                                    <i class="fa fa-trash" data-toggle="tooltip" data-placement="bottom" title="HAPUS"></i>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <!-- The modal Tambah-->
    <div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-labelledby="modalLabelSmall" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="modalLabelSmall"> <i class="fa fa-plus-square"></i> Tambah Data Siswa</h4>
                </div>
                <form action="api/siswa/add_siswa.php" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>NIS</label>
                            <input type="text" name="nis" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>NIP Pembimbing</label>
                            <input type="text" name="nip_pembimbing" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Kompetensi Keahlian</label>
                            <select name="kompetensi_keahlian" id="" class="form-control" required>
                                <option value="">Pilih Kompetensi Keahlian</option>
                                <?php foreach ($kompetensi_keahlian as $kk => $vkk) { ?>
                                    <option value="<?php echo $vkk['id_jurusan_detail'] ?>"> <?php echo $vkk['jurusan'] ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <select name="kelas" id="" class="form-control" required>
                                <option value="">Pilih Kelas</option>
                                <?php foreach ($kelas as $kls => $vkls) { ?>
                                    <option value="<?php echo $vkls['id_kelas_detail'] ?>"> <?php echo $vkls['kelas'] ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Iduka</label>
                            <select name="iduka" id="" class="form-control" required>
                                <option value="">Pilih Iduka</option>
                                <?php foreach ($iduka as $key => $viduka) { ?>
                                    <option value="<?php echo $viduka['id_iduka']; ?>"> <?php echo $viduka['iduka'] ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</a>
                            <button type="submit" class="btn btn-sm btn-primary "><i class="fa fa-save"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--- Modal Delete --->
    <?php foreach ($data as $key => $value) { ?>
        <div class="modal  fade" id="delete<?php echo $value['nis']; ?>">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-trash-o"> </i> Hapus Data</h4>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin akan hapus data dari <br> <b><?php echo $value['nama_siswa']; ?></b> .. ???</p><br>
                        <button class="btn btn-sm btn-default " data-dismiss="modal"><i class="fa fa-close"></i> Close
                            <a href="api/siswa/hapus_siswa.php?nis=<?php echo $value['nis']; ?>"><button type="submit" class="btn  btn-sm btn-danger pull-right"><i class="fa fa-trash-o"></i> Hapus</button></a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php } ?>
    <?php foreach ($data as $key => $value) { ?>
        <!-- The modal Edit-->
        <div class="modal fade" id="gantidata<?php echo $value['nis'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabelSmall" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="modalLabelSmall"> <i class="fa fa-edit"></i> Edit Data Siswa</h4>
                    </div>
                    <form action="api/siswa/edit_siswa.php" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>NIS</label>
                                <input type="text" name="nis" class="form-control" value="<?php echo $value['nis'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" value="<?php echo $value['nama_siswa'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>NIP Pembimbing</label>
                                <input type="text" name="nip_pembimbing" class="form-control" value="<?php echo $value['nip_pembimbing']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Kompetensi Keahlian</label>
                                <select name="kompetensi_keahlian" id="" class="form-control" required>
                                    <option value="<?php echo $value['id_jurusan_detail'] ?>"><?php echo $value['jurusan'] ?></option>
                                    <?php foreach ($kompetensi_keahlian as $kk => $vkk) { ?>
                                        <option value="<?php echo $vkk['id_jurusan_detail'] ?>"> <?php echo $vkk['jurusan'] ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kelas</label>
                                <select name="kelas" id="" class="form-control" required>
                                    <option value="<?php echo $value['id_kelas_detail'] ?>"><?php echo $value['kelas'] ?></option>
                                    <?php foreach ($kelas as $kls => $vkls) { ?>
                                        <option value="<?php echo $vkls['id_kelas_detail'] ?>"> <?php echo $vkls['kelas'] ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Iduka</label>
                                <select name="iduka" id="" class="form-control" required>
                                    <option value="<?php echo $value['id_iduka'] ?>"><?php echo $value['iduka'] ?></option>
                                    <?php foreach ($iduka as $key => $value) { ?>
                                        <option value="<?php echo $value['id_iduka'] ?>"> <?php echo $value['iduka'] ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</a>
                                <button type="submit" class="btn btn-sm btn-primary "><i class="fa fa-save"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="modalLabelSmall" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="modalLabelSmall"> <i class="fa fa-file-excel-o"></i> Import Data</h4>
                </div>
                <form action="api/import/siswa_api.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Pilih File</label>
                            <input type="file" name="file" id="file" accept=".xls,.xlsx" class="form-control" required>
                            <label class="text-success">* Format File Harus Excel (.xls, .xlsx).</label> <br>
                            <label class="text-danger">* PENTING! Panduan Import Data. <a href="panduan_import_siswa.php"><b>( KLIK )</b> </a></label>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</a>
                            <button type="submit" class="btn btn-sm btn-primary pull-right"><i class="fa fa-clloud-download"></i> Import</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ./wrapper -->
    <?php include 'template/footer.php'; ?>