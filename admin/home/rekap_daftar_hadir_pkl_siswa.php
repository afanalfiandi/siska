<?php
include 'template/head.php';
include 'template/header.php';
$data = mysqli_query($conn, "SELECT * FROM daftar_hadir 
  JOIN siswa ON siswa.nis = daftar_hadir.nis ORDER by daftar_hadir.nis");
?>
<section class="content-header">
  <h1> Rekap File Daftar Hadir Siswa PKL </h1>
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
            <th>NIS</th>
            <th>Nama</th>
            <th>Bulan</th>
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
              <td><?php
                  if ($value['bulan'] == '1') {
                    $bln = "Januari";
                  } else if ($value['bulan'] == '2') {
                    $bln = "Februari";
                  } else if ($value['bulan'] == '3') {
                    $bln = "Maret";
                  } else if ($value['bulan'] == '4') {
                    $bln = "April";
                  } else if ($value['bulan'] == '5') {
                    $bln = "Mei";
                  } else if ($value['bulan'] == '6') {
                    $bln = "Juni";
                  } else if ($value['bulan'] == '7') {
                    $bln = "Juli";
                  } else if ($value['bulan'] == '8') {
                    $bln = "Agustus";
                  } else if ($value['bulan'] == '9') {
                    $bln = "September";
                  } else if ($value['bulan'] == '10') {
                    $bln = "Oktober";
                  } else if ($value['bulan'] == '11') {
                    $bln = "November";
                  } else if ($value['bulan'] == '12') {
                    $bln = "Desember";
                  } else {
                    $bln = "Bulan Tidak Valid";
                  }
                  echo $bln; ?></td>
              <td>
                <a href="lihat_daftar_hadir.php?id=<?php echo $value['id_daftar_hadir']; ?>"><img src="assets/img/folder.png" width="30px" height="30px" alt="" data-toggle="tooltip" data-placement="bottom" title="LIHAT FILE">
                  <b>Lihat</b></a>
              </td>
              <td class="text-center">
                <a type="button" data-toggle="modal" data-target="#delete<?php echo $value['id_daftar_hadir']; ?>"><img src="assets/img/red-tong.png" width="30px" height="30px" alt="" data-toggle="tooltip" data-placement="bottom" title="DELETE"></a>
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
    <div class="modal fade" id="delete<?php echo $value['id_daftar_hadir']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabelSmall" aria-hidden="true">
      <div class="modal-dialog modal-sm ">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="modalLabelSmall"> <i class="fa fa-trash-o"></i> Hapus File</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              Apakah anda yakin akan menghapus daftar hadir <b> <?php echo $bln ?> - <?php echo $value['nama']; ?></b> ???
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-sm btn-default pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            <a href="api/siswa/hapus_daftar_hadir.php?id=<?php echo $value['id_daftar_hadir']; ?>" class="btn btn-sm btn-danger pull-right"><i class="fa fa-trash"></i> Hapus</a>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
  <?php include 'template/footer.php'; ?>