<?php
  include 'template/head.php';
  include 'template/header.php';
  $data = mysqli_query($conn, "SELECT * FROM sertifikat 
  JOIN siswa ON sertifikat.nis = siswa.nis 
  JOIN jurusan_detail ON siswa.id_jurusan_detail = jurusan_detail.id_jurusan_detail 
  JOIN kelas_detail ON siswa.id_kelas_detail = kelas_detail.id_kelas_detail
  ORDER BY siswa.nis ASC");
?>
<section class="content-header">
  <h1> Data Sertifikat PJBL </h1>
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
            <th width="30px">No</th>
            <th>NIS</th>
            <th>NAMA</th>
            <th>KELAS</th>
            <th>KOMPETENSI KEAHLIAN</th>
            <th>FILE</th>
            <th>ACTION</th>
          </tr>
        </thead>
        <tbody>
          <?php $nomor = 1; ?>
          <?php foreach ($data as $key => $value) { ?>
            <tr>
              <td class="text-center"><?php echo $nomor++; ?></td>
              <td class="text-center"><?php echo $value['nis'] ?></td>
              <td><?php echo $value['nama'] ?></td>
              <td class="text-center"><?php echo $value['kelas'] ?></td>
              <td><?php echo $value['jurusan'] ?></td>
              <td class="text-center">
                <a href="lihat_sertifikat.php?nis=<?php echo $value['nis']; ?>"><img src="assets/img/serti_logo.png" width="30px" height="30px" alt="" data-toggle="tooltip" data-placement="bottom" title="LIHAT SERTIFIKAT"></a>
              </td>
              <td class="text-center">
                <a type="button" data-toggle="modal" data-target="#delete"><img src="assets/img/red-tong.png" width="30px" height="30px" alt="" data-toggle="tooltip" data-placement="bottom" title="DELETE"></a>
              </td>
            </tr>
          <?php } ?>

        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
  <!-- The modal Hapus-->
  <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="modalLabelSmall" aria-hidden="true">
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
            Apakah anda yakin akan menghapus file sertifikat dari <b><?php echo $value['nama']; ?></b> ???
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-sm btn-default pull-left " data-dismiss="modal"><i class="fa fa-close"></i> Close </button>
          <a href="api/sertifikat/hapus_sertifikat_pjbl.php?id=<?php echo $value['id_sertifikat']; ?>" class="btn btn-sm btn-danger "><i class="fa fa-trash-o"></i> Hapus</a>
        </div>
      </div>
    </div>
  </div>
  <?php include 'template/footer.php'; ?>