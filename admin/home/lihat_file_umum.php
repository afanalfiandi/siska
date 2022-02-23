<?php
include 'template/head.php';
include 'template/header.php';
$id = $_GET['id'];
$sql = mysqli_query($conn, "SELECT * FROM dokumen_umum WHERE id_dokumen = '$id'");
$row = mysqli_fetch_array($sql);
?>
<section class="content-header">
  <h1>
    Lihat File Dokumen <?php
                        if ($halaman = $_GET['halaman'] == 'kurikulum') {
                          echo "( kurikulum )";
                        } elseif ($halaman = $_GET['halaman'] == 'kesiswaan') {
                          echo "( kesiswaan )";
                        } elseif ($halaman = $_GET['halaman'] == 'sarpras') {
                          echo "( sarpras )";
                        } elseif ($halaman = $_GET['halaman'] == 'hki') {
                          echo "( HKI )";
                        } elseif ($halaman = $_GET['halaman'] == 'sdm') {
                          echo "( SDM )";
                        } elseif ($halaman = $_GET['halaman'] == 'pms') {
                          echo "( PMS )";
                        } elseif ($halaman = $_GET['halaman'] == 'keuangan') {
                          echo "( keuangan )";
                        } else {
                          echo "( pengembangan IT )";
                        }
                        ?>
  </h1>
</section>
<!-- Main content -->
<section class="content">
  <button type="button" class="btn btn-sm btn-success " data-toggle="modal" data-target="#gantifile">
    <i class="fa fa-pencil-square"></i> Ganti File
  </button>
  <button type="button" class="btn btn-sm btn-danger " data-toggle="modal" data-target="#hapusfile">
    <i class="fa fa-trash"></i> Hapus File
  </button>
  <a href="admin_dokumen_umum.php?halaman=<?php
                                          if ($halaman = $_GET['halaman'] == 'kurikulum') {
                                            echo "kurikulum";
                                          } elseif ($halaman = $_GET['halaman'] == 'kesiswaan') {
                                            echo "kesiswaan";
                                          } elseif ($halaman = $_GET['halaman'] == 'sarpras') {
                                            echo "sarpras";
                                          } elseif ($halaman = $_GET['halaman'] == 'hki') {
                                            echo "hki";
                                          } elseif ($halaman = $_GET['halaman'] == 'sdm') {
                                            echo "sdm";
                                          } elseif ($halaman = $_GET['halaman'] == 'pms') {
                                            echo "pms";
                                          } elseif ($halaman = $_GET['halaman'] == 'keuangan') {
                                            echo "keuangan";
                                          } else {
                                            echo "pengembanganit";
                                          }
                                          ?>" type="button" class="btn btn-warning btn-sm">
    <i class="fa fa-reply"></i> Kembali</a>
  <p></p>
  <div class="box box-danger ">
    <!-- /.box-header -->
    <div class="box-body">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10"> <iframe src="../../files/arsip/umum/<?php echo $row['files']; ?>" height="850" width="100%" title="Iframe Example"></iframe></div>
      </div>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- The modal Ganti File-->
  <div class="modal fade" id="gantifile" tabindex="-1" role="dialog" aria-labelledby="modalLabelSmall" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="modalLabelSmall"><i class="fa fa-edit"></i> Ganti Dokumen</h4>
        </div>
        <form action="api/dokumen_umum/edit_dokumum.php" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <input type="hidden" name="halaman" value="<?php
                                                        if ($halaman = $_GET['halaman'] == 'kurikulum') {
                                                          echo "kurikulum";
                                                        } elseif ($halaman = $_GET['halaman'] == 'kesiswaan') {
                                                          echo "kesiswaan";
                                                        } elseif ($halaman = $_GET['halaman'] == 'sarpras') {
                                                          echo "sarpras";
                                                        } elseif ($halaman = $_GET['halaman'] == 'hki') {
                                                          echo "hki";
                                                        } elseif ($halaman = $_GET['halaman'] == 'sdm') {
                                                          echo "sdm";
                                                        } elseif ($halaman = $_GET['halaman'] == 'pms') {
                                                          echo "pms";
                                                        } elseif ($halaman = $_GET['halaman'] == 'keuangan') {
                                                          echo "keuangan";
                                                        } else {
                                                          echo "pengembanganit";
                                                        }
                                                        ?>">
            <div class="form-group">
              <label>File</label>
              <input type="file" name="file" class="form-control">
              <input type="hidden" value="<?php echo $row['id_dokumen']; ?>" name="id" required>
              <label class="text-danger">*Ukuran file Maximal 5 mb.</label>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</a>
              <button type="submit" class="btn btn-sm btn-primary pull-right"><i class="fa fa-save"></i> Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- The modal Hapus-->
  <div class="modal fade" id="hapusfile" tabindex="-1" role="dialog" aria-labelledby="modalLabelSmall" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="modalLabelSmall"><i class="fa fa-trash-o"></i> Hapus File</h4>
        </div>
        <form action="api/dokumen_umum/hapus_dokumum.php" method="get">
          <div class="modal-body">
            <input type="hidden" name="halaman" value="<?php
                                                        if ($halaman = $_GET['halaman'] == 'kurikulum') {
                                                          echo "kurikulum";
                                                        } elseif ($halaman = $_GET['halaman'] == 'kesiswaan') {
                                                          echo "kesiswaan";
                                                        } elseif ($halaman = $_GET['halaman'] == 'sarpras') {
                                                          echo "sarpras";
                                                        } elseif ($halaman = $_GET['halaman'] == 'hki') {
                                                          echo "hki";
                                                        } elseif ($halaman = $_GET['halaman'] == 'sdm') {
                                                          echo "sdm";
                                                        } elseif ($halaman = $_GET['halaman'] == 'pms') {
                                                          echo "pms";
                                                        } elseif ($halaman = $_GET['halaman'] == 'keuangan') {
                                                          echo "keuangan";
                                                        } else {
                                                          echo "pengembanganit";
                                                        }
                                                        ?>">
            <input type="hidden" value="<?php echo $row['id_dokumen']; ?>" name="id">
            <div class="form-group">
              Apakah anda yakin akan menghapus File <b><?php echo $row['nama_dokumen']; ?></b> ???
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-sm btn-default pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</a>
              <button type="submit" class="btn btn-sm btn-danger pull-right"><i class="fa fa-trash"></i> Hapus</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php include 'template/footer.php'; ?>