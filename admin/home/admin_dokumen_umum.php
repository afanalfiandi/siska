<?php
include 'template/head.php';
include 'template/header.php';

if ($halaman = $_GET['halaman'] == 'kurikulum') {
  $dokumen = mysqli_query($conn, "SELECT * FROM dokumen_umum WHERE id_dokumen_umum_detail = '1' ");
} elseif ($halaman = $_GET['halaman'] == 'kesiswaan') {
  $dokumen = mysqli_query($conn, "SELECT * FROM dokumen_umum WHERE id_dokumen_umum_detail = '2' ");
} elseif ($halaman = $_GET['halaman'] == 'sarpras') {
  $dokumen = mysqli_query($conn, "SELECT * FROM dokumen_umum WHERE id_dokumen_umum_detail = '3' ");
} elseif ($halaman = $_GET['halaman'] == 'hki') {
  $dokumen = mysqli_query($conn, "SELECT * FROM dokumen_umum WHERE id_dokumen_umum_detail = '4' ");
} elseif ($halaman = $_GET['halaman'] == 'sdm') {
  $dokumen = mysqli_query($conn, "SELECT * FROM dokumen_umum WHERE id_dokumen_umum_detail = '5' ");
} elseif ($halaman = $_GET['halaman'] == 'pms') {
  $dokumen = mysqli_query($conn, "SELECT * FROM dokumen_umum WHERE id_dokumen_umum_detail = '6' ");
} elseif ($halaman = $_GET['halaman'] == 'keuangan') {
  $dokumen = mysqli_query($conn, "SELECT * FROM dokumen_umum WHERE id_dokumen_umum_detail = '7' ");
} else {
  $dokumen = mysqli_query($conn, "SELECT * FROM dokumen_umum WHERE id_dokumen_umum_detail = '8' ");
}
?>

<section class="content-header">
  <h1>
    <?php
    if ($halaman = $_GET['halaman'] == 'kurikulum') {
      echo "Dokumen Kurikulum";
    } elseif ($halaman = $_GET['halaman'] == 'kesiswaan') {
      echo "Dokumen Kesiswaan";
    } elseif ($halaman = $_GET['halaman'] == 'sarpras') {
      echo "Dokumen Sarpras";
    } elseif ($halaman = $_GET['halaman'] == 'hki') {
      echo "Dokumen HKI";
    } elseif ($halaman = $_GET['halaman'] == 'sdm') {
      echo "Dokumen SDM";
    } elseif ($halaman = $_GET['halaman'] == 'pms') {
      echo "Dokumen PMS";
    } elseif ($halaman = $_GET['halaman'] == 'keuangan') {
      echo "Dokumen Keuangan";
    } else {
      echo "Dokumen Pengembangan IT";
    }
    ?>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <button type="button" class="btn btn-danger btn-sm " data-toggle="modal" data-target="#upload">
    <i class="fa fa-plus"></i> Add Data</button>
  <p></p>
  <!-- Default box -->
  <div class="box box-danger ">
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th width="10px">No.</th>
            <th>Nama Dokumen</th>
            <th width="120px">Tanggal Upload</th>
            <th width="10px">action</th>
          </tr>
        </thead>
        <tbody>
          <?php $nomor = 1; ?>
          <?php foreach ($dokumen as $key => $value) { ?>
            <tr>
              <td class="text-center"><?php echo $nomor++; ?></td>
              <td><a href="lihat_file_umum.php?halaman=<?php
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
                                                        ?>&id=<?php echo $value['id_dokumen']; ?>"><img src="assets/img/folder.png" width="23px" height="23px" alt=""> <b><?php echo $value['nama_dokumen']; ?></b></a></td>              
              <td class="text-center"><span class="label label-info"><i class="fa fa-calendar-o"></i> <?php echo date('d-M-Y'); ?></span></td>
              <td class="text-center">
                <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete<?php echo $value['id_dokumen']; ?>">
                  <i class="fa fa-trash" data-toggle="tooltip" data-placement="bottom" title="DELETE"> </i>
                </button>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
  <!-- The modal Upload-->
  <div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-labelledby="modalLabelSmall" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="modalLabelSmall"><i class="fa fa-plus-square"></i> Upload Dokumen</h4>
        </div>
        <form action="api/dokumen_umum/add_dokumum.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <input class="form-control" type="hidden" name="id_dokumen_umum_detail" value="
            <?php
            if ($halaman = $_GET['halaman'] == 'kurikulum') {
              echo "1";
              $hal = '1';
            } elseif ($halaman = $_GET['halaman'] == 'kesiswaan') {
              echo "2";
              $hal = '2';
            } elseif ($halaman = $_GET['halaman'] == 'sarpras') {
              echo "3";
              $hal = '3';
            } elseif ($halaman = $_GET['halaman'] == 'hki') {
              echo "4";
              $hal = '4';
            } elseif ($halaman = $_GET['halaman'] == 'sdm') {
              echo "5";
              $hal = '5';
            } elseif ($halaman = $_GET['halaman'] == 'pms') {
              echo "6";
              $hal = '6';
            } elseif ($halaman = $_GET['halaman'] == 'keuangan') {
              echo "7";
              $hal = '7';
            } else {
              echo "8";
              $hal = '8';
            }
            ?>">
          </div>

          <div class="modal-body">
            <div class="form-group">
              <label>File</label>
              <input type="file" name="file" class="form-control" required>
              <label class="text-danger">*Ukuran file Maximal 5 mb .</label>
            </div>

            <div class="form-group">
              <label>Nama File</label>
              <input type="text" name="nama_dokumen" class="form-control" required>
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


  <?php foreach ($dokumen as $key => $value) { ?>
    <div class="modal  fade" id="delete<?php echo $value['id_dokumen']; ?>">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><i class="fa fa-trash"> </i> Hapus File </h4>
          </div>
          <div class="modal-body">
            <p>Apakah anda yakin akan hapus data <?php echo $value['nama_dokumen']; ?> <br> <b></b> .. ???</p><br>
            <button class="btn btn-sm btn-default " data-dismiss="modal"><i class="fa fa-close"></i> Close
              <a href="api/dokumen_umum/hapus_dokumum.php?id=<?php echo $value['id_dokumen']; ?>&&halaman=<?php
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
                                                                                                                ?>"><button type="submit" class="btn btn-sm btn-danger pull-right"><i class="fa fa-trash-o"></i> Hapus</button></a>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
  <?php } ?>
  <?php include 'template/footer.php'; ?>