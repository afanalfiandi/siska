<?php include '../kit/head.php'; ?>
<?php include 'kit/nav.php'; ?>
<?php include 'api/getData.php'; ?>
<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-11 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Data Siswa Bimbingan</span>
        </div>
        <div class="col-12 col-sm-1 text-center text-sm-left mt-3 mb-0">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">Tambah Data</button>
        </div>
    </div>
    <div class="row">
        <div class="col-lg col-md-6 col-sm-6 mb-4">
            <div class="card card-small mb-4 p-2">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Data Siswa Bimbingan</h6>
                </div>
                <div class="card-body p-0 pb-3 text-center" style="overflow-x:auto;">
                    <table class="table mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col" class="border-0">No. </th>
                                <th scope="col" class="border-0">NIS</th>
                                <th scope="col" class="border-0">Nama</th>
                                <th scope="col" class="border-0">Kelas</th>
                                <th scope="col" class="border-0">Jurusan</th>
                                <th scope="col" class="border-0">DUDI/Instansi</th>
                                <th scope="col" colspan="2" class="border-0">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($siswaBimbingan as $key => $value) { ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $value['nis']; ?></td>
                                    <td><?php echo $value['nama']; ?></td>
                                    <td><?php echo $value['kelas']; ?></td>
                                    <td><?php echo $value['jurusan']; ?></td>
                                    <td><?php echo $value['iduka']; ?></td>
                                    <td>
                                        <button type="button" data-toggle="modal" data-target="#editModal<?php echo $value['nis']; ?>" class="btn btn-primary">Ubah</button>
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
                <form action="api/tambah_siswa.php" method="POST">
                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <input type="hidden" name="nip" value="<?php echo $nip; ?>">
                        <select name="peserta" style="width: 100%;" class="form-control guru-tambahSiswa" required>
                            <?php foreach ($siswa as $key => $value) { ?>
                                <option value="<?php echo $value['nis']; ?>"><?php echo $value['nama']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>DUDI/Instansi</label>
                        <select name="iduka" style="width: 100%;" class="form-control guru-tambahSiswa">
                            <?php foreach ($dudi as $key => $value) { ?>
                                <option value="<?php echo $value['id_iduka']; ?>"><?php echo $value['iduka']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="modal-footer text-right">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php foreach ($siswaBimbingan as $key => $value) { ?>
    <div class="modal fade" id="editModal<?php echo $value['nis']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="keluarModalLabel">Hapus file</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="api/ubah_siswa.php" method="POST">
                        <div class="form-group">
                            <label>NIS</label>
                            <input type="text" name="nis" class="form-control" value="<?php echo $value['nis']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="<?php echo $value['nama']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>DUDI/Instansi</label>
                            <select name="iduka" style="width: 100%;" class="form-control guru-editSiswa">
                                <?php foreach ($dudi as $key => $value) { ?>
                                    <option value="<?php echo $value['id_iduka']; ?>"><?php echo $value['iduka']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


<?php foreach ($siswaBimbingan as $key => $value) { ?>
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
                    <a class="btn btn-primary" href="api/hapus_siswa.php?nis=<?php echo $value['nis']; ?>">Hapus</a>
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

<script>
    $(".guru-tambahSiswa").select2({
        dropdownParent: $('#tambahModal')
    });
    <?php foreach ($siswaBimbingan as $key => $value) { ?>
        $(".guru-editSiswa").select2({
            dropdownParent: $('#editModal<?php echo $value['nis']; ?>')
        });
    <?php } ?>
</script>