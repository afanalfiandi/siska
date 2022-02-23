<?php
include 'kit/head.php';
include 'kit/nav-side.php';
?>

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <?php include 'kit/nav-head.php'; ?>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header mx-4 p-3 text-center">
                                <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                    <i class="fas fa-file-alt opacity-10"></i>
                                </div>
                            </div>
                            <div class="card-body pt-0 p-3 text-center">
                                <h6 class="text-center mb-0">Doc. Wajib</h6>
                                <span class="text-md"><?php echo $totalWajib['total']; ?></span>
                                <hr class="horizontal dark my-3">
                                <a href="dok_wajib.php?page=2" class="mb-0 text-sm">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-md-0 mt-4">
                        <div class="card">
                            <div class="card-header mx-4 p-3 text-center">
                                <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                    <i class="fas fa-book opacity-10"></i>
                                </div>
                            </div>
                            <div class="card-body pt-0 p-3 text-center">
                                <h6 class="text-center mb-0">Doc. Saya</h6>
                                <span class="text-md"><?php echo $totalSaya['total']; ?></span>
                                <hr class="horizontal dark my-3">
                                <a href="dok_saya.php?page=3" class="mb-0 text-sm">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-md-0 mt-4">
                        <div class="card">
                            <div class="card-header mx-4 p-3 text-center">
                                <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                <i class="fas fa-file-powerpoint opacity-10"></i>
                                </div>
                            </div>
                            <div class="card-body pt-0 p-3 text-center">
                                <h6 class="text-center mb-0">Doc. Umum</h6>
                                <span class="text-md"><?php echo $totalUmum['total']; ?></span>
                                <hr class="horizontal dark my-3">
                                <a href="dok_umum.php?page=4" class="mb-0 text-sm">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php include 'kit/nav-foot.php'; ?>
</main>
<?php include 'kit/foot.php'; ?>