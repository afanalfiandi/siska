<?php include 'template/head.php';
include 'template/header.php';
include 'api/koneksi.php';
$dokumen = mysqli_query($conn, "SELECT * FROM dokumen_detail");
?>
<section class="content-header">
      <h1> Icons <small>a set of beautiful icons</small> </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box box-danger box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Tampil Semua Data <b>" SK CPNS "</b></h3>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead >
                    <tr >
                        <th >No</th>
                        <th>NIP</th>
                        <th>Nama Pegawai</th>
                        <th class="text-center">File</th>                   
                    </tr>
                </thead>
                <tbody>
                <?php $nomor=1;?>
                            <?php foreach ($dokumen as $key => $value) { ?>
                            <tr>
                                <td><?php echo $nomor; ?></td>
                                <td>18088764</td>
                                <td>Sueng Pangesti</td>
                                <td class="text-center"><a >
                            <i class="fa fa-file-pdf-o fa-2x label-danger"></i></a><br>
                             SK CNPS.pdf
                        </td>
                            </tr>
                            <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.box -->
<!-- ./wrapper -->
<?php include 'template/footer.php'; ?>