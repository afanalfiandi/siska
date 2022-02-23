<?php
    include 'template/head.php';
    include 'template/header.php';
    $dokumen = mysqli_query($conn, "SELECT dokumen_wajib_detail.jenis_dokumen, dokumen_wajib.nip, dokumen_wajib.id_dokumen_wajib_detail, dokumen_wajib.id_dokumen, dokumen_wajib.tgl_upload, karyawan.nama as nama_kary, guru.nama as nama_guru
    FROM dokumen_wajib_detail
    JOIN dokumen_wajib ON dokumen_wajib_detail.id_dokumen_wajib_detail = dokumen_wajib.id_dokumen_wajib_detail
    LEFT JOIN karyawan ON dokumen_wajib.nip = karyawan.nip
    LEFT JOIN guru ON dokumen_wajib.nip = guru.nip
    ");
?>
<section class="content-header">
    <h1> Dokumen Wajib </h1>
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box box-danger ">
        <!-- <div class="box-header with-border">
        <h3 class="box-title"> <i class="fa fa-cube"></i> <b>DOKUMEN WAJIB</b></h3>
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
                        <th>No</th>
                        <th>NIP</th>
                        <th>NAMA</th>
                        <th>JENIS DOKUMEN</th>
                        <th>TANGAL UPLOAD</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php while ($pecah = mysqli_fetch_array($dokumen)) { ?>
                        <tr>
                            <td class="text-center"><?php echo $nomor++; ?></td>
                            <td class="text-center"><?php echo $pecah['nip']; ?></td>
                            <td><?php
                                if ($pecah['nama_kary'] == '') {
                                    echo $pecah['nama_guru'];
                                } else if ($pecah['nama_guru'] == '') {
                                    echo $pecah['nama_kary'];
                                }
                                ?></td>
                            <td><a href="lihat_file_wajib.php?id=<?php echo $pecah['id_dokumen'] ?>"><img src="assets/img/folder.png" width="35px" height="35px" alt=""> <b><?php echo $pecah['jenis_dokumen']; ?></b></a></td>
                            <td class="text-center"><span class="label label-info"><?php echo $pecah['tgl_upload']; ?></span></td>
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