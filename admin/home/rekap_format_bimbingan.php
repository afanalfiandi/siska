<?php 
  include 'template/head.php';
  include 'template/header.php';
  $data = mysqli_query($conn, "SELECT * FROM format_bimbingan 
  JOIN siswa ON siswa.nis = format_bimbingan.nis ORDER by format_bimbingan.nis");
?>
<section class="content-header">
  <h1> Rekap File Format Bimbingan </h1>
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
            <th>No</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Tanggal </th>
            <th>File</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $nomor = 1; ?>
          <?php foreach ($data as $key => $value) { ?>
            <tr>
              <td class="text-center"><?php echo $nomor++; ?></td>
              <td><?php echo $value['nis']; ?></td>
              <td><?php echo $value['nama']; ?></td>
              <td class="text-center"><span class="label label-info"><i class="fa fa-calendar-o"></i> 
              <?php echo $value['tgl_mulai']; ?> - <?php echo $value['tgl_akhir']; ?></span></td>
              <td>
                <a href="lihat_format_bimbingan.php?id=<?php echo $value['id_format_bimbingan']; ?>"><img src="assets/img/folder.png" width="30px" height="30px" alt="" data-toggle="tooltip" data-placement="bottom" title="LIHAT FILE"> <b>
                  Lihat</b></a>
              </td>
              <td class="text-center">
                <a type="button" data-toggle="modal" data-target="#delete<?php echo $value['id_format_bimbingan']; ?>"><img src="assets/img/red-tong.png" width="30px" height="30px" alt="" data-toggle="tooltip" data-placement="bottom" title="DELETE"></a>
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
    <div class="modal fade" id="delete<?php echo $value['id_format_bimbingan']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabelSmall" aria-hidden="true">
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
              Apakah anda yakin akan menghapus file - <?php echo $value['nama']; ?></b> ???
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-sm btn-default pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            <a href="api/format_bimbingan/hapus_format_bimbingan.php?id=<?php echo $value['id_format_bimbingan']; ?>" class="btn btn-sm btn-danger pull-right"><i class="fa fa-trash"></i> Hapus</a>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
  <?php include 'template/footer.php'; ?>