<!--   Core JS Files   -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="assets/js/plugins/chartjs.min.js"></script>

<script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Sales",
                tension: 0.4,
                borderWidth: 0,
                borderRadius: 4,
                borderSkipped: false,
                backgroundColor: "#fff",
                data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
                maxBarThickness: 6
            }, ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                    },
                    ticks: {
                        suggestedMin: 0,
                        suggestedMax: 500,
                        beginAtZero: true,
                        padding: 15,
                        font: {
                            size: 14,
                            family: "Open Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                        color: "#fff"
                    },
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false
                    },
                    ticks: {
                        display: false
                    },
                },
            },
        },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

    new Chart(ctx2, {
        type: "line",
        data: {
            labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#cb0c9f",
                    borderWidth: 3,
                    backgroundColor: gradientStroke1,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                },
                {
                    label: "Websites",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#3A416F",
                    borderWidth: 3,
                    backgroundColor: gradientStroke2,
                    fill: true,
                    data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
                    maxBarThickness: 6
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        padding: 10,
                        color: '#b2b9bf',
                        font: {
                            size: 11,
                            family: "Open Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        color: '#b2b9bf',
                        padding: 20,
                        font: {
                            size: 11,
                            family: "Open Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
            },
        },
    });
</script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

    <?php if ($page == '1') { ?>
        document.getElementById('link-1').className = "nav-link active";
        document.getElementById('page-title').innerHTML = "Dashboard";
    <?php } else if ($page == '2') { ?>
        document.getElementById('link-2').className = "nav-link active";
        document.getElementById('page-title').innerHTML = "Dokumen Wajib";
    <?php } else if ($page == '3') { ?>
        document.getElementById('link-3').className = "nav-link active";
        document.getElementById('page-title').innerHTML = "Dokumen Saya";
    <?php } else if ($page == '4') { ?>
        document.getElementById('link-4').className = "nav-link active";
        document.getElementById('page-title').innerHTML = "Dokumen Umum";
    <?php } else if ($page == '5') { ?>
        document.getElementById('page-title').innerHTML = "Profil Saya";
    <?php } else { ?>
        document.getElementById('page-title').innerHTML = "Bantuan";
    <?php } ?>
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
</body>

</html>

<?php foreach ($berita as $key => $value) { ?>
    <div class="modal fade" id="berita<?php echo $value['id_berita']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Detail Berita</h5>
                </div>
                <div class="modal-body">
                    <h5>
                        <?php echo $value['isi']; ?>
                    </h5>
                    <p class="text-xs text-secondary mb-0">
                        <i class="fa fa-clock me-1"></i>
                        <?php echo $value['tgl_terbit']; ?>
                    </p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<div class="modal fade" id="ubahProfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Ubah Profil</h5>
            </div>
            <div class="modal-body">
                <form action="api/ubah_profil.php" method="POST">
                    <div class="form-group">
                        <label>NIP</label>
                        <input type="hidden" name="level" value="<?php echo $level; ?>" class="form-control">
                        <input type="text" name="nip" value="<?php echo $nip; ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" value="<?php echo $nama; ?>" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-dark" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ubahPw" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Ubah Password</h5>
            </div>
            <div class="modal-body">
                <form action="api/ubah_password.php" method="POST">
                    <div class="form-group">
                        <label>Password Lama</label>
                        <input type="hidden" name="level" value="<?php echo $level; ?>" class="form-control">
                        <input type="password" name="lama" class="form-control">
                        <input type="hidden" name="nip" value="<?php echo $nip ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password Baru</label>
                        <input type="password" name="baru" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-dark" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="upload-wajib" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Upload Dokumen Wajib</h5>
            </div>
            <div class="modal-body">
                <form action="api/upload_wajib.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>File</label>
                        <input type="file" name="file" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Jenis Dokumen</label>
                        <select name="jenis_dokumen" class="form-control">
                            <?php foreach ($jenisWajib as $key => $value) { ?>
                                <option value="<?php echo $value['id_dokumen_wajib_detail'] ?>"><?php echo $value['jenis_dokumen'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tgl Upload</label>
                        <input type="text" value="<?php echo convertDateDBtoIndo(date('Y-m-d')); ?>" name="tgl_upload" class="form-control" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-dark" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php foreach ($getWajib as $key => $value) { ?>
    <div class="modal fade" id="ubah-wajib<?php echo $value['id_dokumen']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ubah Dokumen Wajib</h5>
                </div>
                <div class="modal-body">
                    <form action="api/ubah_wajib.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>File</label>
                            <input type="hidden" name="id" value="<?php echo $value['id_dokumen']; ?>" class="form-control">
                            <input type="file" name="file" class="form-control">
                        </div>
                        <!-- <div class="form-group">
                        <label>Jenis Dokumen</label>
                        <select name="jenis_dokumen" class="form-control">
                            <?php foreach ($jenisWajib as $key => $value) { ?>
                            <option value="<?php echo $value['id_dokumen_wajib_detail'] ?>"><?php echo $value['jenis_dokumen'] ?></option>
                            <?php } ?>
                        </select>
                    </div> -->
                        <div class="form-group">
                            <label>Tgl Upload</label>
                            <input type="text" value="<?php echo convertDateDBtoIndo(date('Y-m-d')); ?>" name="tgl_upload" class="form-control" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-dark" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>



<?php foreach ($getWajib as $key => $value) { ?>
    <div class="modal fade" id="hapus-wajib<?php echo $value['id_dokumen'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Keluar</h5>
                </div>
                <div class="modal-body">
                    <h5>Apakah Anda yakin ingin menghapus?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-dark" data-dismiss="modal">Batal</button>
                    <a href="api/hapus_wajib.php?id=<?php echo $value['id_dokumen'] ?>" class="btn btn-sm btn-primary">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<div class="modal fade" id="upload-saya" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Upload Dokumen Saya</h5>
            </div>
            <div class="modal-body">
                <form action="api/upload_saya.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>File</label>
                        <input type="file" name="file" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nama Dokumen</label>
                        <input type="text" name="nama_dokumen" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tgl Upload</label>
                        <input type="text" value="<?php echo convertDateDBtoIndo(date('Y-m-d')); ?>" name="tgl_upload" class="form-control" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-dark" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php foreach ($getSaya as $key => $value) { ?>
    <div class="modal fade" id="ubah-saya<?php echo $value['id_dokumen']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ubah Dokumen Saya</h5>
                </div>
                <div class="modal-body">
                    <form action="api/ubah_saya.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>File</label>
                            <input type="hidden" name="id" value="<?php echo $value['id_dokumen']; ?>" class="form-control">
                            <input type="file" name="file" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nama Dokumen</label>
                            <input type="text" name="nama_dokumen" value="<?php echo $value['nama_dokumen']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tgl Upload</label>
                            <input type="text" value="<?php echo convertDateDBtoIndo(date('Y-m-d')); ?>" name="tgl_upload" class="form-control" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-dark" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php foreach ($getSaya as $key => $value) { ?>
    <div class="modal fade" id="hapus-saya<?php echo $value['id_dokumen'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Keluar</h5>
                </div>
                <div class="modal-body">
                    <h5>Apakah Anda yakin ingin menghapus?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-dark" data-dismiss="modal">Batal</button>
                    <a href="api/hapus_saya.php?id=<?php echo $value['id_dokumen'] ?>" class="btn btn-sm btn-primary">Keluar</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Keluar</h5>
            </div>
            <div class="modal-body">
                <h5>Apakah Anda yakin ingin keluar?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-dark" data-dismiss="modal">Batal</button>
                <a href="api/logout.php" class="btn btn-sm btn-primary">Keluar</a>
            </div>
        </div>
    </div>
</div>