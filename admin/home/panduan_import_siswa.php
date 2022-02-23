<?php 
  include 'template/head.php'; 
  include 'template/header.php'; 
?>

<section class="content-header">
  <h1> Panduan Import Data Peserta Didik </h1>
</section>
<!-- Main content -->
<section class="content">
  <a href="data_siswa.php" type="button" class="btn btn-warning btn-sm ">
    <i class="fa fa-reply"></i> Kembali</a>
  <p></p>
  <div class="box box-danger ">
    <!-- /.box-header -->
    <div class="box-body">
      <iframe src="panduan/panduan_import_data_siswa.pdf" height="850" width="100%" title="Iframe Example"></iframe>
    </div>
    <!-- /.box-body -->
  </div>
  <?php include 'template/footer.php'; ?>