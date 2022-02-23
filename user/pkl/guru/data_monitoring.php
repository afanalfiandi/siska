<?php include '../kit/head.php'; ?>
<?php include 'kit/nav.php'; ?>
<?php include 'api/getData.php'; ?>
<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-11 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Data Monitoring</span>
        </div>
        <div class="col-12 col-sm-1 text-center text-sm-left mt-3 mb-0">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">Tambah Data</button>
        </div>
    </div>
    <div class="row">
        <div class="col-lg col-md-6 col-sm-6 mb-4">
            <div class="card card-small mb-4 p-2">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Data Monitoring</h6>
                </div>
                <div class="card-body p-0 pb-3 text-center" style="overflow-x:auto;">
                    <table class="table mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col" class="border-0">No. </th>
                                <th scope="col" class="border-0">Lihat File</th>
                                <th scope="col" class="border-0">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($dMonitoring as $key => $value) { ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td>
                                        <a href="../../../files/pkl/data_monitoring/<?php echo $value['files']; ?>">
                                            <?php echo $value['files']; ?>
                                        </a>
                                    </td>
                                    <td>
                                        <button type="button" data-toggle="modal" data-target="#hapusModal" class="btn btn-danger">Hapus</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="add_name" id="add_name" action="api/data_monitoring.php" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Pembimbing</label>
                        <input type="hidden" name="nip" value="<?php echo $_SESSION['nip']; ?>" id="form-pembimbing" readonly class="form-control">
                        <input type="text" name="form_pembimbing" value="<?php echo $_SESSION['nama']; ?>" readonly class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kompetensi Keahlian</label>
                        <select class="form-control" name="form_jurusan" id="exampleFormControlSelect1">
                            <?php foreach ($jurusan as $key => $value) { ?>
                                <option value="<?php echo $value['jurusan']; ?>"><?php echo $value['jurusan']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Peserta Didik <span class="text-danger" style="font-size:11px;">*kosongkan yang tidak perlu</span> </label>
                        <input type="text" class="form-control" name="peserta1">
                    </div>
                    <?php for ($i = 2; $i <= 9; $i++) { ?>
                        <div class="form-group">
                            <!-- <button type="button" class="btn btn-sm btn-success ml-2" name="add" id="add">+</button> -->
                            <input type="text" class="form-control" name="peserta<?php echo $i; ?>">
                            <!-- <table class="mt-1 mb-1" id="dynamic_field" style="width: 100%;">
                                
                                </table> -->
                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama DUDI/Instansi</label>
                        <select name="dudi" class="form-control" onchange="alamatValue(this.value)" required>
                            <?php
                            $result = mysqli_query($conn, "SELECT * FROM iduka ORDER BY iduka ASC");
                            $js = "var iduka = new Array();\n";
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<option value="' . $row['id_iduka'] . '">' . $row['iduka'] . '</option>';
                                $js .= "iduka['" . $row['id_iduka'] . "'] = {
                                                        id:'" . addslashes($row['id_iduka']) . "'
                                                        ,iduka:'" . addslashes($row['iduka']) . "'
                                                        ,alamat:'" . addslashes($row['alamat']) . "'
                                                    };\n";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat DUDI/Instansi</label>
                        <input type="text" class="form-control" name="alamat_dudi" id="alamat_dudi" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Pembimbing DUDI</label>
                        <input type="text" name="pembimbing_dudi" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nomor Kontak DUDI</label>
                        <input type="number" name="no_dudi" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" id="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php foreach ($dMonitoring as $key => $value) { ?>
    <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="keluarModalLabel">Hapus file</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <a href="api/hapus_data_monitoring.php?id=<?php echo $value['id_data_monitoring']; ?>&&file=<?php echo $value['files'] ?>" class="btn btn-primary">Keluar</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php include '../kit/foot.php'; ?>
<script>
    <?php echo $js; ?>

    function alamatValue(id) {
        document.getElementById('alamat_dudi').value = iduka[id].alamat;
    };
</script>