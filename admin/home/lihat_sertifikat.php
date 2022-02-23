<?php
  include 'template/head.php';
  include 'template/header.php';
  $nis = $_GET['nis'];
  $sql = mysqli_query($conn, "SELECT * FROM sertifikat WHERE nis = '$nis'");
  $row = mysqli_fetch_array($sql);
?>
<section class="content-header">
  <h1> Lihat Sertifikat PJBL </h1>
</section>
<!-- Main content -->
<section class="content">
  <a href="rekap_sertifikat.php" type="button" class="btn btn-warning btn-sm ">
    <i class="fa fa-reply"></i> Kembali</a>
  <p></p>
  <div class="box box-danger ">
    <!-- /.box-header -->
    <div class="box-body">
      
      <iframe src="../../files/pkl/sertifikat/<?php echo $row['files']; ?>" height="850" width="100%" title="Iframe Example"></iframe>
    </div>
    <!-- /.box-body -->
  </div>
  <?php include 'template/footer.php'; ?>