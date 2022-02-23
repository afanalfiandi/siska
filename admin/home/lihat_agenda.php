<?php 
  include 'template/head.php'; 
  include 'template/header.php';
  $id = $_GET['id'];
  $sql = mysqli_query($conn, "SELECT * FROM agenda WHERE id_agenda = '$id'");
  $row = mysqli_fetch_array($sql);
?>
<section class="content-header">
  <h1> Lihat File Agenda </h1>
</section>
<!-- Main content -->
<section class="content">
  <a href="rekap_agenda.php" type="button" class="btn btn-warning btn-sm ">
    <i class="fa fa-reply"></i> Kembali</a>
  <p></p>
  <div class="box box-danger ">
    <!-- /.box-header -->
    <div class="box-body">
      <iframe src="../../files/pkl/agenda/<?php echo $row['files']; ?>" height="850" width="100%" title="Iframe Example"></iframe>
    </div>
    <!-- /.box-body -->
  </div>
  <?php include 'template/footer.php'; ?>