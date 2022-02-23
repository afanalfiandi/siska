<?php
  include 'template/head.php';
  include 'template/header.php';
  $data = mysqli_query($conn, "SELECT * FROM data_monitoring
  JOIN iduka ON data_monitoring.id_iduka = iduka.id_iduka");
?>
<section class="content-header">
  <h1> Rekap File Data Monitoring </h1>
</section>
<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="box box-danger ">
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th width="10px">No</th>
            <th>NIP</th>
            <th width="250px">Nama File</th>
            <th width="220px">Iduka</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $nomor = 1; ?>
          <?php foreach ($data as $key => $value) { ?>
            <tr>
              <td class="text-center"><?php echo $nomor++; ?></td>
              <td><?php echo $value['nip']; ?></td>
              <td>
                <a href="lihat_data_monitoring.php?id=<?php echo $value['id_data_monitoring']; ?>">
                <img src="assets/img/folder.png" width="25px" height="25px" alt="" data-toggle="tooltip" data-placement="bottom" title="LIHAT FILE"><b>
                  Lihat</b></a>
              </td>
              <td> <?php echo $value['iduka']; ?></td>
              <td class="text-center">
                <a type="button" data-toggle="modal" data-target="#delete<?php echo $value['id_data_monitoring']; ?>">
                  <img src="assets/img/red-tong.png" width="20px" height="20px" alt="" data-toggle="tooltip" data-placement="bottom" title="DELETE"></a>
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
    <div class="modal fade" id="delete<?php echo $value['id_data_monitoring']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabelSmall" aria-hidden="true">
      <div class="modal-dialog modal-sm ">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="modalLabelSmall"> <i class="fa fa-trash-o fa-lg "></i> Hapus File</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              Apakah anda yakin akan menghapus file <br> <b> - <?php echo $value['iduka']; ?></b> ???
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-sm btn-default pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            <a href="api/monitoring/hapus_data_monitoring.php?id=<?php echo $value['id_data_monitoring'] ?>" class="btn btn-sm btn-danger pull-right"><i class="fa fa-trash"></i> Hapus</a>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
  <?php include 'template/footer.php'; ?>