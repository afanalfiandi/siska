<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" target="_blank">
            <i class="fas fa-file opacity-10"></i>
            <span class="ms-2 mt-4 text-lg font-weight-bold">E-ARSIP</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100 h-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a id="link-1" class="nav-link" href="index.php?page=1">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-secondary text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-landmark opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a id="link-2" class="nav-link" href="dok_wajib.php?page=2">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-secondary text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-file opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dokumen Wajib</span>
                </a>
            </li>
            <li class="nav-item">
                <a id="link-3" class="nav-link" href="dok_saya.php?page=3">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-secondary text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-book opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dokumen Saya</span>
                </a>
            </li>
            <li class="nav-item">
                <a id="link-4" class="nav-link dropdown" data-toggle="dropdown">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-secondary text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-archive opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dokumen Umum</span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <?php
                    $getDocUmum = mysqli_query($conn, "SELECT * FROM dokumen_umum_detail 
                    ORDER BY jenis_dokumen ASC");

                    foreach ($getDocUmum as $key => $value) { ?>
                        <li class="nav-item ms-3">
                            <a id="link-4" class="nav-link" href="dok_umum.php?page=4&&jenis=<?php echo $value['id_dokumen_umum_detail']; ?>">
                                <div class="icon icon-shape icon-sm shadow border-radius-md bg-secondary text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-archive opacity-10"></i>
                                </div>
                                <span class="nav-link-text"> - <?php echo $value['jenis_dokumen']; ?></span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </li>
            <!-- <li class="nav-item">
                <a href="#" class="nav-link dropdown" data-toggle="dropdown">
                    <i class="material-icons">assignment</i>
                    <span>Monitoring <b style="right: 0; margin-right:15px; position:fixed;">></b> </span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li class="nav-item">
                        <a class="nav-link" href="data_monitoring.php">
                            <i class="material-icons">book</i>
                            <span>Data Monitoring</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="bukti_monitoring.php">
                            <i class="material-icons">library_books</i>
                            <span>Bukti Monitoring</span>
                        </a>
                    </li>
                </ul>
            </li> -->
            <hr>
            <!-- <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
            </li> -->
            <li class="nav-item fixed-bottom">
                <a data-toggle="modal" data-target="#logout" class="nav-link">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-secondary text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-power-off opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Keluar</span>
                </a>
            </li>
        </ul>
    </div>
</aside>