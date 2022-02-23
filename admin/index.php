<?php
include 'api/conn.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>SIMS &mdash; SMKN1</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="assets/fonts/icomoon/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="assets/css/aos.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/img/smkn1pwt.png" type="image/x-icon">
</head>

<body>
    <div class="site-wrap">
        <header class="site-navbar py-4 site-navbar-target" role="banner">
            <div class="container-fluid">
                <div class="d-flex align-items-center">
                    <img src="assets/img/smkn1pwt.png" alt="" width="40" style="margin-right: 10px;">
                    <div class="site-logo mr-auto w-30"><a href="index.html">SMK N 1 Purwokerto</a>
                    </div>
                </div>
            </div>
        </header>

        <div class="intro-section" id="home-section">
            <div class="slide-1" style="background-image: url('assets/img/smk1.jpg');" data-stellar-background-ratio="0.5">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="row align-items-center">
                                <div class="col-lg-6 mb-4">
                                    <h3 style="text-align: center;color:white" data-aos="fade-up" data-aos-delay="100">Sistem Informasi Manajemen Sekolah - Admin</h3>
                                    <p style="text-align: center;" data-aos="fade-up" data-aos-delay="300"> <b> Aplikasi pengelolaan kearsipan dan praktek kerja lapangan. </b> </p>
                                    <!-- <p style="text-align: center;" data-aos="fade-up" data-aos-delay="300">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Lihat Pengumuman
                                        </button>
                                    </p> -->
                                </div>

                                <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="500">
                                    <form action="" method="post" class="form-box">
                                        <h3 class="h4 text-black mb-4">Masuk</h3>
                                        <div class="form-group">
                                            <input type="text" name="nip" class="form-control" placeholder="NIP" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                            <button style="width: 100%;" type="submit" name="submit" class="btn btn-primary">
                                                Masuk
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- .site-wrap -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.stellar.min.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>
    <script src="assets/js/bootstrap-datepicker.min.js"></script>
    <script src="assets/js/jquery.easing.1.3.js"></script>
    <script src="assets/js/aos.js"></script>
    <script src="assets/js/jquery.fancybox.min.js"></script>
    <script src="assets/js/jquery.sticky.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script src="assets/js/main.js"></script>

</body>

</html>


<?php
if (isset($_POST['submit'])) {
    $nip = $_POST['nip'];
    $password = md5($_POST['password']);

    $sql = mysqli_query($conn, "SELECT * FROM admin WHERE nip = '$nip' AND password = '$password'");
    $row = mysqli_fetch_array($sql);

    if ($row > 0) {
        $_SESSION['nama_admin'] = $row['nama'];
        $_SESSION['nip_admin'] = $row['nip']; ?>
        <script>
            location.replace('home/');
        </script>
    <?php } else { ?>
        <script>
            alert('NIP atau Password Salah!');
            window.history.back();
        </script>
<?php }
}
?>