<?php 
include 'template/head.php';
include 'template/header.php';
include 'api/library/encryption/encrypt.php';
$data = mysqli_query($conn, "SELECT nip, nama
FROM karyawan");
?>

<section class="content-header">
    <h1> Data Karyawan </h1>
</section>
<!-- Main content -->
<section class="content">
    <!-- <a type="button" class="btn btn-success btn-sm " data-toggle="modal" data-target="#import">
    <i class="fa fa-cloud-download"></i> Import Data</a> -->
    <a type="button" class="btn btn-danger btn-sm " data-toggle="modal" data-target="#upload">
        <i class="fa fa-plus-square"></i> Add Data
    </a>
    <p></p>
    <!-- Default box -->
    <div class="box box-danger ">
        <!-- /.box-header -->
        <div class="box-body">            
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="30px">No</th>
                        <th>NIP</th>
                        <th>Nama </th>
                        <th width="60px;" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php foreach ($data as $key => $value) { ?>
                        <tr>
                            <td><?php echo $nomor++; ?></td>
                            <td><?php echo $value['nip'] ?></td>
                            <td><?php echo $value['nama'] ?></td>                            
                            <td class="text-center">
                                <button type="button" class="btn btn-xs btn-success " data-toggle="modal" data-target="#gantidata<?php echo $value['nip'] ?>">
                                    <i class="fa fa-pencil-square" data-toggle="tooltip" data-placement="bottom" title="EDIT"></i>
                                </button>
                                <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete<?php echo $value['nip']; ?>">
                                    <i class="fa fa-trash" data-toggle="tooltip" data-placement="bottom" title="DELETE"> </i> </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <!-- The modal edit-->
    <div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-labelledby="modalLabelSmall" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="modalLabelSmall"><i class="fa fa-plus-square"> </i> Tambah Data Karyawan</h4>
                </div>
                <form action="api/pegawai/add_karyawan.php" method="post">
                    <div class="modal-body">
                        <label> Mohon isi data dengan lengkap (kosongi jika tidak diperlukan). </label>
                        <div class="form-group">
                            <label>NIP</label>
                            <input type="text" name="nip" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <!-- <?php for ($i = 1; $i <= 3; $i++) { ?>
                            <div class="form-group">
                                <label>Jabatan <?php echo $i; ?></label>
                                <select name="jabatan<?php echo $i; ?>" id="" class="form-control">
                                    <option value="">Pilih Jabatan <?php echo $i; ?> </option>
                                    <?php foreach ($jabatan as $p => $vp) { ?>
                                        <option value="<?php echo $vp['id_jabatan'] ?>"> <?php echo $vp['nama_jabatan'] ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        <?php } ?> -->
                        <!-- <div class="form-group">
                            <label>Golongan</label>
                            <select name="golongan" id="" class="form-control" required>
                                <option value="">Pilih Golongan</option>
                                <?php foreach ($golongan as $p => $vp) { ?>
                                    <option value="<?php echo $vp['id_golongan_detail'] ?>"> <?php echo $vp['golongan'] ?> </option>
                                <?php } ?>
                            </select>
                        </div> -->
                    </div>
                    <div class="modal-footer">
                        <button class="btn  btn-sm btn-danger pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</a>
                            <button type="submit" class="btn btn-sm btn-primary "><i class="fa fa-save"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--- Modal Delete --->
    <?php foreach ($data as $key => $value) { ?>
        <div class="modal  fade" id="delete<?php echo $value['nip']; ?>">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-trash"> </i> Hapus Data</h4>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin akan hapus data dari <br> <b><?php echo $value['nama']; ?></b> .. ???</p><br>
                        <button class="btn btn-sm btn-default " data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <a href="api/pegawai/hapus_karyawan.php?nip=<?php echo $value['nip']; ?>" type="button" class="btn btn-sm btn-danger pull-right"><i class="fa fa-trash-o"></i> Hapus</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php } ?>
    <?php foreach ($data as $key => $value) { ?>
        <!-- The modal edit-->
        <div class="modal fade" id="gantidata<?php echo $value['nip'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabelSmall" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="modalLabelSmall"><i class="fa fa-pencil-square"> </i> Edit Data Karyawan</h4>
                    </div>
                    <form method="post" action="api/pegawai/edit_karyawan.php">
                        <div class="modal-body">
                            <label> Mohon tetap isi data dengan lengkap (kosongi jika tidak diperlukan). </label>
                            <div class="form-group">
                                <label>NIP</label>
                                <input type="text" name="nip" class="form-control" value="<?php echo $value['nip'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" value="<?php echo $value['nama'] ?>" required>
                            </div>
                            <!-- <?php for ($i = 1; $i <= 3; $i++) { ?>
                                <div class="form-group">
                                    <label>Jabatan <?php echo $i; ?></label>
                                    <select name="jabatan<?php echo $i; ?>" id="" class="form-control">
                                        <option value="">Pilih Jabatan <?php echo $i; ?> </option>
                                        <?php foreach ($jabatan as $p => $vp) { ?>
                                            <option value="<?php echo $vp['id_jabatan'] ?>"> <?php echo $vp['nama_jabatan'] ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            <?php } ?>
                            <div class="form-group">
                                <label>Golongan</label>
                                <select name="golongan" id="" class="form-control" required>
                                    <option value="">Pilih Golongan</option>
                                    <?php foreach ($golongan as $p => $vp) { ?>
                                        <option value="<?php echo $vp['id_golongan_detail'] ?>"> <?php echo $vp['golongan'] ?> </option>
                                    <?php } ?>
                                </select>
                            </div> -->
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-sm btn-danger  pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</a>
                            <button type="submit" class="btn  btn-sm btn-primary"><i class="fa fa-save"></i> Save</button>
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
                <form action="api/ubah_profil.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Pilih File</label>
                            <input type="file" name="img" class="form-control" required>
                            <label class="text-success">* Format File Harus Excel (.xls, .xlsx).</label> <br>
                            <label class="text-danger"># PENTING! Panduan Import Data. <a href=""><b>( KLIK )</b> </a></label>
                        </div>
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