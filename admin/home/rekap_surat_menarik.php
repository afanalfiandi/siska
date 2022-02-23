<?php 
  include 'template/head.php';
  include 'template/header.php';
  $data = mysqli_query($conn, "SELECT * FROM surat
  JOIN surat_detail ON surat.id_surat_detail = surat_detail.id_surat_detail
  JOIN iduka ON surat.id_iduka = iduka.id_iduka 
  WHERE surat.id_surat_detail ='4'
  ORDER BY tgl_surat ASC");
?>
<section class="content-header">
  <h1> Rekap Surat Menarik </h1>
</section>
<!-- Main content -->
<section class="content">
  <a href="surat_menarik.php" type="button" class="btn btn-danger btn-sm ">
    <i class="fa fa-plus-square"></i> Buat Surat Menarik</a>
  <p></p>
  <!-- Default box -->
  <div class="box box-danger ">
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Jenis Surat</th>
            <th>Iduka</th>
            <th>Tanggal Surat </th>
            <th>File</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $nomor = 1; ?>
          <?php foreach ($data as $key => $value) { ?>
            <tr>
              <td class="text-center"><?php echo $nomor++; ?></td>
              <td><?php echo $value['surat']; ?></td>
              <td><?php echo $value['iduka']; ?></td>
              <td class="text-center"><span class="label label-info"><i class="fa fa-calendar-o"></i> <?php echo $value['tgl_surat']; ?></span></td>
              <td class="text-center">
                <a href="lihat_surat_penarikan.php?id=<?php echo $value['id_surat']; ?>"><img src="assets/img/folder.png" width="30px" height="30px" alt="" data-toggle="tooltip" data-placement="bottom" title="LIHAT SURAT"></a>
              </td>
              <td class="text-center">
                <a type="button" data-toggle="modal" data-target="#delete<?php echo $value['id_surat']; ?>"><img src="assets/img/red-tong.png" width="30px" height="30px" alt="" data-toggle="tooltip" data-placement="bottom" title="DELETE"></a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
  <?php foreach ($data as $key => $value) { ?>
    <!-- The modal Hapus-->
    <div class="modal fade" id="delete<?php echo $value['id_surat']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabelSmall" aria-hidden="true">
      <div class="modal-dialog modal-sm ">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="modalLabelSmall"><i class="fa fa-trash-o"></i> Hapus File</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <p> Apakah anda yakin akan menghapus Surat <br> <b><?php echo $value['iduka']; ?></b> ???</p>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-sm btn-default pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close
              <a href="api/surat/menarik/hapus.php?id=<?php echo $value['id_surat']; ?>&&files=<?php echo $value['files']; ?>">
                <button type="submit" class="btn btn-sm btn-danger "><i class="fa fa-trash-o"></i> Hapus</button>
              </a>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
  <?php include 'template/footer.php'; ?>