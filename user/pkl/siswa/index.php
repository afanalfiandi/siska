<?php
include '../kit/head.php';
include 'kit/nav.php';
include 'api/conn.php';
$getSiswa = mysqli_query($conn, "SELECT * FROM siswa WHERE nis = '" . $_SESSION['nis'] . "'");
$row = mysqli_fetch_array($getSiswa);

if (!isset($row['nip_pembimbing'])) { ?>
    <script>
        location.replace('form/');
    </script>
<?php } else if (!isset($row['id_iduka'])) { ?>
    location.replace('form/');
<?php } ?>
<div class="main-content-container container-fluid px-4">
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Dashboard</span>
        </div>
    </div>
    <div class="row">
        <div class="col-lg col-md-12">
            <div class="card" style="border-radius: 0; box-shadow: none;">
                <div class="card-body">
                    Selamat Datang di SIMS - PKL SMK Negeri 1 Purwokerto!
                </div>
            </div>
        </div>
    </div>
</div>
</main>
</div>
</div>
<?php include '../kit/foot.php'; ?>