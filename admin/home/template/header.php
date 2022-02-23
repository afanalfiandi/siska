<body class="hold-transition skin-red fixed sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="index.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>DM</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>ADMIN-</b>siska</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img style="color:white;" src="assets/img/gambar.png" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo $_SESSION['nama_admin']; ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="assets/img/gambar.png" class="img-circle" alt="User Image">

                  <p>
                    <?php echo $_SESSION['nama_admin']; ?> 
                    
                  </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                  <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="profil.php" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="api/logout.php" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <div class="user-panel userpanel">
          <div class="pull-left image">
            <img src="assets/img/gambar.png" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo $_SESSION['nama_admin']; ?></p>
            <p class="nip">NIP. <?php echo $_SESSION['nip_admin']; ?></p>
            <a><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <br>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header" text-center text-white><b><?php
                                              function hariIndo($hariInggris)
                                              {
                                                switch ($hariInggris) {
                                                  case 'Sunday':
                                                    return 'Minggu';
                                                  case 'Monday':
                                                    return 'Senin';
                                                  case 'Tuesday':
                                                    return 'Selasa';
                                                  case 'Wednesday':
                                                    return 'Rabu';
                                                  case 'Thursday':
                                                    return 'Kamis';
                                                  case 'Friday':
                                                    return 'Jumat';
                                                  case 'Saturday':
                                                    return 'Sabtu';
                                                  default:
                                                    return 'hari tidak valid';
                                                }
                                              }

                                              $tgl = date('Y-m-d');
                                              $convert_tgl = DateTime::createFromFormat('Y-m-d', $tgl);
                                              $hari = $convert_tgl->format('l');
                                              echo hariIndo($hari) . ", ";
                                              echo convertDateDBtoIndo($tgl); ?></b></li>
          <li>
            <a href="index.php">
              <i class="fa fa-dashboard text-center"></i> <span>Dashboard</span>
            </a>
          </li>
        
          <!--- ADMIN E-ARSIP --->
          <li class="header">E-ARSIP</li>
          <li>
            <a href="data_jenis_dokumen_wajib.php">
              <i class="fa fa-list text-center"></i> <span>Data Jenis Dokumen Wajib</span>
            </a>
          </li>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span>Rekap File Arsip</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="admin_tampil_dokwajib.php"><i class="fa fa-caret-right"></i> Dokumen Wajib</a></li>
            <li><a href="admin_tampil_doksaya.php"><i class="fa fa-caret-right"></i> Dokumen Saya</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-caret-right"></i> Dokumen Umum 
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
              <li><a href="admin_dokumen_umum.php?halaman=kurikulum"><i class="fa fa-circle-o"></i> Kurikulum</a></li>
                <li><a href="admin_dokumen_umum.php?halaman=kesiswaan"><i class="fa fa-circle-o"></i> Kesiswaan</a></li>
                <li><a href="admin_dokumen_umum.php?halaman=sarpras"><i class="fa fa-circle-o"></i> Sarpras</a></li>
                <li><a href="admin_dokumen_umum.php?halaman=hki"><i class="fa fa-circle-o"></i> HKI</a></li>
                <li><a href="admin_dokumen_umum.php?halaman=sdm"><i class="fa fa-circle-o"></i> SDM</a></li>
                <li><a href="admin_dokumen_umum.php?halaman=pms"><i class="fa fa-circle-o"></i> PMS</a></li>
                <li><a href="admin_dokumen_umum.php?halaman=keuangan"><i class="fa fa-circle-o"></i> Keuangan</a></li>
                <li><a href="admin_dokumen_umum.php?halaman=pengembanganit"><i class="fa fa-circle-o"></i> Pengembangan IT</a></li>
                
              </ul>
            </li>
           
          </ul>
          </li>
       
          
          <!--- ADMIN SISKA-PKL --->
          <li class="header">SISKA-PKL</li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-database"></i>
              <span>Master Data</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
            <li><a href="data_pegawai.php"><i class="fa fa-caret-right"></i> Data Guru</a></li>
            <li><a href="data_karyawan.php"><i class="fa fa-caret-right"></i> Data Karyawan</a></li>
              <li><a href="data_siswa.php"><i class="fa fa-caret-right"></i> Data Peserta Didik</a></li>
              <li><a href="data_iduka.php"><i class="fa fa-caret-right"></i> Data Iduka</a></li>
              <li><a href="data_kelas.php"><i class="fa fa-caret-right"></i> Data Kelas</a></li>
              <li><a href="data_kompetensi_keahlian.php"><i class="fa fa-caret-right"></i> Data Kompetensi Keahlian</a></li>
              <!-- <li><a href="data_jabatan_karyawan.php"><i class="fa fa-caret-right"></i> Data Jabatan Karyawan</a></li>
              <li><a href="data_pangkat_guru.php"><i class="fa fa-caret-right"></i> Data Pangkat Guru</a></li>
              <li><a href="data_golongan.php"><i class="fa fa-caret-right"></i> Data Golongan</a></li> -->
            </ul>
          </li>
        
          <li class="treeview">
            <a href="#">
              <i class="fa  fa-th-large"></i>
              <span>Nilai</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="rekap_nilai.php"><i class="fa fa-caret-right"></i> Nilai PJBL</a></li>
              <!-- <li><a href="#"><i class="fa fa-caret-right"></i> Nilai Laporan</a></li> -->
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-credit-card"></i>
              <span>Sertifikat</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="rekap_sertifikat.php"><i class="fa fa-caret-right"></i> Sertifikat PJBL</a></li>
              <!-- <li><a href="#"><i class="fa fa-caret-right"></i> Sertifikat Laporan</a></li> -->
            </ul>
          </li>
         
          <li class="treeview">
            <a href="#">
              <i class="fa fa-envelope"></i>
              <span>Rekap Surat</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="rekap_surat_permohonan.php"><i class="fa fa-caret-right"></i> Surat Permohonan</a></li>
              <li><a href="rekap_surat.php"><i class="fa fa-caret-right"></i> Surat Tugas</a></li>
              <li><a href="rekap_surat_mengantar.php"><i class="fa fa-caret-right"></i> Surat Pengantar</a></li>
              <li><a href="rekap_surat_menarik.php"><i class="fa fa-caret-right"></i> Surat Penarikan</a></li>
            </ul>
          </li>
          
          
          <li class="treeview">
            <a href="#">
              <i class="fa fa-file"></i>
              <span>Rekap File PKL</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="rekap_data_monitoring.php"><i class="fa fa-caret-right"></i> Data Monitoring</a></li>
              <li><a href="rekap_Bukti_monitoring.php"><i class="fa fa-caret-right"></i> Bukti Monitoring</a></li>
              <li><a href="rekap_daftar_hadir_pkl_siswa.php"><i class="fa fa-caret-right"></i> Daftar Hadir Siswa</a></li>
              <li><a href="rekap_agenda.php"><i class="fa fa-caret-right"></i> Agenda Siswa </a></li>
              <li><a href="rekap_format_bimbingan.php"><i class="fa fa-caret-right"></i> Format Bimbingan Siswa</a></li>
            </ul>
          </li>
          <li>
            <a href="berita_acara.php">
              <i class="fa fa-list text-center"></i> <span>Berita Acara</span>
            </a>
          </li>
          <li>
            <a href="data_admin.php">
              <i class="fa fa-user text-center"></i> <span> Data Admin</span>
            </a>
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


     