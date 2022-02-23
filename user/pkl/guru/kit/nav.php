<?php include 'api/getData.php'; ?>

<body class="h-100">
    <div class="color-switcher animated" style="width: 20%;">
        <h5>Bantuan</h5>
        <div class="actions mb-2">
            <a class="mb-2 btn btn-primary w-100 d-table mx-auto extra-action" href="#">
                Data Monitoring
            </a>
        </div>
        <div class="actions mb-2">
            <a class="mb-2 btn btn-primary w-100 d-table mx-auto extra-action" href="#">
                Bukti Monitoring
            </a>
        </div>
        <div class="actions mb-2">
            <a class="mb-2 btn btn-primary w-100 d-table mx-auto extra-action" href="#">
                Nilai PJBL
            </a>
        </div>
        <div class="actions mb-2">
            <a class="mb-2 btn btn-primary w-100 d-table mx-auto extra-action" href="#">
                Sertifikat
            </a>
        </div>
        <div class="social-wrapper">
            <div class="social-actions">
                <a class="mb-2 btn btn-danger w-100 d-table mx-auto extra-action" data-toggle="modal" data-target="#keluarModal" href="#">
                    Keluar
                </a>
            </div>
        </div>
        <div class="close">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- <div class="color-switcher-toggle animated pulse infinite">
        <i class="material-icons">help_outline</i>
    </div> -->
    <div class="container-fluid">
        <div class="row">
            <!-- Main Sidebar -->
            <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
                <div class="main-navbar">
                    <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
                        <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                            <div class="d-table m-auto">
                                <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="../assets/images/smkn1pwt.png" alt="Shards Dashboard">
                                <span class="d-none d-md-inline ml-1">S I M S - P K L </span>
                            </div>
                        </a>
                        <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                            <i class="material-icons">&#xE5C4;</i>
                        </a>
                    </nav>
                </div>
                <div class="nav-wrapper">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">
                                <i class="material-icons">edit</i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="siswa.php">
                                <i class="material-icons">school</i>
                                <span>Data Siswa Bimbingan</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="kegiatan.php">
                                <i class="material-icons">work</i>
                                <span>Kegiatan Siswa</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="kehadiran.php">
                                <i class="material-icons">check_box</i>
                                <span>Data Kehadiran Siswa</span>
                            </a>
                        </li>
                        <li class="nav-item">
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
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="nilai.php">
                                <i class="material-icons">grade</i>
                                <span>Nilai PJBL</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="sertifikat.php">
                                <i class="material-icons">collections_bookmark</i>
                                <span>Sertifikat</span>
                            </a>
                        </li>
                        <li class="nav-item" style="bottom: 0px; position: fixed;">
                            <a class="nav-link " data-toggle="modal" data-target="#keluarModal">
                                <i class="material-icons">logout</i>
                                <span>Keluar</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>
            <!-- End Main Sidebar -->
            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
                <div class="main-navbar sticky-top bg-white">
                    <!-- Main Navbar -->
                    <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
                        <form action="#" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
                            <div class="input-group input-group-seamless ml-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"></div>
                                </div>
                                <h5 style="margin-top: 1.8%;">SMK Negeri 1 Purwokerto</h5>
                            </div>
                        </form>
                        <ul class="navbar-nav flex-row ">
                            <li class="nav-item  dropdown notifications">
                                <a class="nav-link nav-link-icon text-center" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="nav-link-icon__wrapper">
                                        <i class="material-icons">&#xE7F4;</i>
                                        <?php if ($gBerita['total'] > 0) { ?>
                                            <span class="badge badge-pill badge-danger"><?php echo $gBerita['total']; ?></span>
                                        <?php } ?>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-small" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">
                                        <div class="notification__icon-wrapper">
                                            <div class="notification__icon">
                                                <i class="material-icons">notifications_active</i>
                                            </div>
                                        </div>
                                        <div class="notification__content">
                                            <!-- <span class="notification__category">Analytics</span> -->
                                            <?php if ($gBerita['total'] > 0) { ?>
                                                <?php foreach ($berita as $key => $value) { ?>
                                                    <p>
                                                        <?php echo $value['isi']; ?>
                                                    </p>
                                                <?php }
                                            } else { ?>
                                                <p> Halo, tidak ada notifikasi baru disini! </p>
                                            <?php } ?>
                                        </div>
                                    </a>
                                    <a class="dropdown-item notification__all text-center" href="#"> Tutup </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <?php if (!isset($_SESSION['img'])) { ?>
                                        <img class="user-avatar rounded-circle mr-2" height="41" width="40" src="../../../files/img/profil/default.png">
                                    <?php } else { ?>
                                        <img class="user-avatar rounded-circle mr-2" height="41" width="40" src="../../../files/img/profil/<?php echo $_SESSION['img']; ?>">
                                    <?php } ?>
                                    <span class="d-none d-md-inline-block"><?php echo $_SESSION['nama']; ?></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-small">
                                    <a class="dropdown-item" href="profil.php">
                                        <i class="material-icons">&#xE7FD;</i> Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="#" data-toggle="modal" data-target="#keluarModal">
                                        <i class="material-icons text-danger">&#xE879;</i> Keluar </a>
                                </div>
                            </li>
                        </ul>
                        <nav class="nav">
                            <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                                <i class="material-icons">&#xE5D2;</i>
                            </a>
                        </nav>
                    </nav>
                </div>
                <!-- / .main-navbar -->