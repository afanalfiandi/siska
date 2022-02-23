<?php 
  include 'template/head.php';
  include 'template/header.php';
  $id = $_GET['id'];
  $sql = mysqli_query($conn, "SELECT * FROM daftar_hadir WHERE id_daftar_hadir = '$id'");
  $row = mysqli_fetch_array($sql);
?>

<section class="content-header">
  <h1> Lihat File Daftar Hadir Siswa PKL </h1>
</section>
<!-- Main content -->
<section class="content">
  <a href="rekap_daftar_hadir_pkl_siswa.php" type="button" class="btn btn-warning btn-sm ">
    <i class="fa fa-reply"></i> Kembali</a>
  <p></p>
  <div class="box box-danger ">
    <!-- /.box-header -->
    <div class="box-body">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10"><iframe src="../../files/pkl/daftar_hadir/<?php echo $row['files']; ?>" height="850" width="100%" title="Iframe Example"></iframe>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <?php include 'template/footer.php'; ?>