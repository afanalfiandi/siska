<?php 
    include 'template/head.php';
    include 'template/header.php';
    $data = mysqli_query($conn, "SELECT * FROM dokumen_wajib_detail");
?>
<section class="content-header">
    <h1> Data Jenis Dokumen</h1>
</section>
<!-- Main content -->
<section class="content">
    <button type="button" class="btn btn-danger btn-rounded btn-sm " data-toggle="modal" data-target="#upload">
        <i class="fa fa-plus-square mr-2"></i> Add Data</button>
    <p></p>
    <!-- Default box -->
    <div class="box box-danger ">
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>JENIS DOKUMEN</th>
                        <th width="120px;" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php foreach ($data as $key => $value) { ?>
                        <tr>
                            <td><?php echo $nomor++; ?></td>
                            <td><?php echo $value['jenis_dokumen'] ?></td>
                            <td class="text-center">
                                <a type="button" class="btn btn-xs btn-success " data-toggle="modal" data-target="#gantidata<?php echo $value['id_dokumen_wajib_detail'] ?>">
                                    <i class="fa fa-edit" data-toggle="tooltip" data-placement="bottom" title="EDIT"></i>
                                </a>
                                <a type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete<?php echo $value['id_dokumen_wajib_detail']; ?>">
                                    <i class="fa fa-trash" data-toggle="tooltip" data-placement="bottom" title="DELETE"> </i>
                                </a>
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
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="modalLabelSmall"> <i class="fa fa-plus-square"></i> Tambah Data</h4>
                </div>
                <form action="api/jenis_dokumen/add_jenis_dok.php" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Jenis Dokumen</label>
                            <input type="text" name="jenis_dokumen" class="form-control" required>
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
        <div class="modal  fade" id="delete<?php echo $value['id_dokumen_wajib_detail']; ?>">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-trash"> </i> Hapus Data</h4>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin akan hapus data <br> <b><?php echo $value['jenis_dokumen']; ?></b> .. ???</p><br>
                        <button class="btn btn-sm btn-default " data-dismiss="modal"><i class="fa fa-close"></i> Close
                            <a href="api/jenis_dokumen/delete_jenisdok.php?id=<?php echo $value['id_dokumen_wajib_detail']; ?>">
                                <button type="submit" class="btn btn-sm btn-danger pull-right"><i class="fa fa-trash"></i> Hapus</button>
                            </a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php } ?>
    <?php foreach ($data as $key => $value) { ?>
        <!-- The modal Edit-->
        <div class="modal fade" id="gantidata<?php echo $value['id_dokumen_wajib_detail'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabelSmall" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="modalLabelSmall"> <i class="fa fa-edit"></i> Edit Data </h4>
                    </div>
                    <form action="api/jenis_dokumen/edit_jenis_dok.php" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?php echo $value['id_dokumen_wajib_detail'] ?>">
                                <label>Jenis Dokumen</label>
                                <input type="text" name="jenis_dokumen" value="<?php echo $value['jenis_dokumen']; ?>" class="form-control" required>
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
    <!-- ./wrapper -->
    <?php include 'template/footer.php'; ?>