<?php
    include 'template/head.php';
    include 'template/header.php';
    $data = mysqli_query($conn, "SELECT * FROM berita");
    $tujuan_berita = mysqli_query($conn, "SELECT * FROM berita_detail");
?>
<section class="content-header">
    <h1> Halaman Kelola Berita Acara </h1>
</section>
<!-- Main content -->
<section class="content">
    <button type="button" class="btn btn-danger btn-sm " data-toggle="modal" data-target="#upload">
        <i class="fa fa-plus-square"></i> Add Data</button>
    <p></p>
    <!-- Default box -->
    <div class="box box-danger ">
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="10px">No.</th>
                        <th>Isi Berita</th>
                        <th>Tujuan </th>
                        <th width="120px">Tanggal Terbit </th>
                        <th width="120px;" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php foreach ($data as $key => $value) { ?>
                        <tr>
                            <td><?php echo $nomor++; ?></td>
                            <td><?php echo $value['isi'] ?></td>
                            <?php if ($value['id_berita_detail'] == 1) { ?>
                                <td class="text-center"><span class="label label-warning">Umum</span></td>
                            <?php } else if ($value['id_berita_detail'] == 2) { ?>
                                <td class="text-center"><span class="label label-info">Guru</span></td>
                            <?php } else { ?>
                                <td class="text-center"><span class="label label-success">Siswa</span></td>
                            <?php } ?>
                            <td class="text-center"><span class="label label-info"><?php echo $value['tgl_terbit'] ?></span></td>
                            <td class="text-center">
                                <button type="button" class="btn btn-xs btn-success " data-toggle="modal" data-target="#gantidata<?php echo $value['id_berita'] ?>">
                                    <i class="fa fa-pencil-square" data-toggle="tooltip" data-placement="bottom" title="EDIT"></i>
                                </button>
                                <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete<?php echo $value['id_berita']; ?>">
                                    <i class="fa fa-trash" data-toggle="tooltip" data-placement="bottom" title="DELETE"> </i>
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
                    <h4 class="modal-title" id="modalLabelSmall"> <i class="fa fa-plus-square"></i> Tambah Berita acara</h4>
                </div>
                <form action="api/berita/add_berita.php" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Isi Berita</label>
                            <textarea name="isi_berita" id="" cols="30" rows="5" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Terbit</label>
                            <input type="date" name="tgl_terbit" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Tujuan Berita</label>
                            <select name="tujuan_berita" class="form-control" required>
                                <option value="">---Pilih Tujuan Berita---</option>
                                <?php
                                foreach ($tujuan_berita as $key => $value) { ?>
                                    <option value="<?php echo $value['id_berita_detail']; ?>"><?php echo $value['tujuan']; ?></option>
                                <?php } ?>
                            </select>
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

    <!--- Modal Delete --->
    <?php foreach ($data as $key => $value) { ?>
        <div class="modal fade" id="delete<?php echo $value['id_berita']; ?>">
            <div class="modal-dialog modal-sm ">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-trash"> </i> Hapus Berita Acara</h4>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin akan hapus konten <br> <b><?php echo $value['isi']; ?></b> .. ???</p><br>
                        <button class="btn btn-sm btn-default " data-dismiss="modal"><i class="fa fa-close"></i> Close
                            <a href="api/berita/delete_berita.php?id=<?php echo $value['id_berita']; ?>">
                        <button type="submit" class="btn btn-sm btn-danger pull-right"><i class="fa fa-trash-o"></i> Hapus</button></a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php } ?>

    <?php foreach ($data as $key => $value) { ?>
        <!-- The modal Edit-->
        <div class="modal fade" id="gantidata<?php echo $value['id_berita'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabelSmall" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="modalLabelSmall"><i class="fa fa-edit"></i> Edit Berita Acara</h4>
                    </div>
                    <form action="api/berita/edit_berita.php" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" value="<?php echo $value['id_berita']; ?>" name="id" id="" cols="30" rows="5" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Isi Berita</label>
                                <textarea name="isi_berita" id="" cols="30" rows="5" class="form-control" required><?php echo $value['isi']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Terbit</label>
                                <input type="date" name="tgl_terbit" value="<?php echo $value['tgl_terbit']; ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Tujuan Berita</label>
                                <select name="tujuan_berita" class="form-control" required>
                                    <option value="">---Pilih Tujuan Berita---</option>
                                    <?php
                                    foreach ($tujuan_berita as $key => $value) { ?>
                                        <option value="<?php echo $value['id_berita_detail']; ?>"><?php echo $value['tujuan']; ?></option>
                                    <?php } ?>
                                </select>
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
    <?php } ?>
    <!-- ./wrapper -->
    <?php include 'template/footer.php'; ?>