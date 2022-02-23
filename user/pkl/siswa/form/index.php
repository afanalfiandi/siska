<?php
session_start();
include '../api/conn.php';

$kelas = mysqli_query($conn, "SELECT * FROM kelas_detail ORDER BY kelas ASC");
$jurusan = mysqli_query($conn, "SELECT * FROM jurusan_detail ORDER BY jurusan ASC");
$guru = mysqli_query($conn, "SELECT * FROM guru ORDER BY nama ASC");
$iduka = mysqli_query($conn, "SELECT * FROM iduka ORDER BY iduka ASC");
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700,900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- Style -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <title>SIMS</title>
</head>

<body>
  <div class="mb-5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
          <div class="mb-3" style="text-align: center; margin-top: 50px;">
            <h5>Hi, <?php echo $_SESSION['nama']; ?></h5>
            <h5>Silahkan lengkapi data berikut ini terlebih dahulu, ya!</h5>
          </div>
          <div class="card">
            <div class="card-body">
              <form method="POST" action="../api/form_data.php">
                <div class="form-group">
                  <label>Kelas</label>
                  <select name="kelas" class="form-control">
                    <?php foreach ($kelas as $key => $value) { ?>
                      <option value="<?php echo $value['id_kelas_detail'] ?>"><?php echo $value['kelas'] ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Kompetensi Keahlian/Jurusan</label>
                  <select name="jurusan" class="form-control">
                    <?php foreach ($jurusan as $key => $value) { ?>
                      <option value="<?php echo $value['id_jurusan_detail'] ?>"><?php echo $value['jurusan'] ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Nomor Induk Siswa (NIS)</label>
                  <input type="text" name="nis" class="form-control" value="<?php echo $_SESSION['nis']; ?>" readonly>
                </div>
                <div class="form-group">
                  <label> Nama Pembimbing PKL</label>
                  
                  <select name="pembimbing" style="width: 100%;" class="form-control select_pembimbing" required>
                    <option value=""></option>
                    <?php foreach ($guru as $key => $value) { ?>
                      <option value="<?php echo $value['nip']; ?>"><?php echo $value['nama']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label> Tempat PKL</label>
                  <select name="iduka" style="width: 100%;" class="form-control select_iduka" required>
                    <option value=""></option>
                    <option value="1">
                      <button class="btn btn-primary">+ Tambah Tempat PKL </button>
                    </option>
                    <?php foreach ($iduka as $key => $value) { ?>
                      <option value="<?php echo $value['id_iduka']; ?>"><?php echo $value['iduka']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group text-center">
                  <button type="submit" class="btn btn-secondary">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</body>
<script>
  $(".select_pembimbing").select2({
    placeholder: "Pilih Guru Pembimbing"
  });
  $(".select_iduka").select2({
    placeholder: "Pilih Tempat PKL"
  });
</script>

</html>