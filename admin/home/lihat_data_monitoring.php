<?php 
  include 'template/head.php';
  include 'template/header.php';
  $id = $_GET['id'];
  $sql = mysqli_query($conn, "SELECT * FROM data_monitoring WHERE id_data_monitoring = '$id'");
  $row = mysqli_fetch_array($sql);
?>
<section class="content-header">
  <h1> Lihat File Data Monitoring </h1>
</section>
<!-- Main content -->
<section class="content">
  <a href="rekap_data_monitoring.php" type="button" class="btn btn-danger btn-sm">
    <i class="fa fa-reply"></i> Kembali</a>
  <p></p>
  <div class="box box-danger ">
    <!-- /.box-header -->
    <div class="box-body">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10"><iframe src="../../files/pkl/data_monitoring/<?php echo $row['files']; ?>" height="850" width="100%" title="Iframe Example"></iframe></div>
      </div>
    </div>
    <!-- /.box-body -->
  </div>
  <?php include 'template/footer.php'; ?>