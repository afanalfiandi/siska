<?php
    include 'template/head.php';
    include 'template/header.php';
    $dokumen = mysqli_query($conn, "SELECT * FROM dokumen_saya");
?>
<section class="content-header">
    <h1> Dokumen Saya </h1>
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box box-danger ">
        <!-- <div class="box-header with-border">
        <h3 class="box-title"> <i class="fa fa-cube"></i><b> DOKUMEN SAYA</b></h3>

        <div class="box-tools pull-right">
            <a type="button" class="btn btn-danger btn-xs btn-flat" data-toggle="modal" data-target="#upload">
                <i class="fa fa-plus"></i> Add Data</a>
        </div>
        
    </div> -->
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="10px">No</th>
                        <th>NIP</th>
                        <th>Nama Dokumen</th>
                        <th>Tanggal Upload</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php foreach ($dokumen as $key => $value) { ?>
                        <tr>
                            <td class="text-center"><?php echo $nomor++; ?></td>
                            <td class="text-center"><?php echo $value['nip']; ?></td>
                            <td><a href="lihat_file_saya.php?id=<?php echo $value['id_dokumen']; ?>"><img src="assets/img/folder.png" width="30px" height="30px" alt=""> <b><?php echo $value['nama_dokumen']; ?></b></a></td>
                            <td class="text-center"><span class="label label-info"><i class="fa fa-calendar-o"></i> <?php echo $value['tgl_upload']; ?></span></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <!-- The modal Upload-->
    <!-- ./wrapper -->
    <?php include 'template/footer.php'; ?>