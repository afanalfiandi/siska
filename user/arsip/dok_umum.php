<?php
include 'kit/head.php';
include 'kit/nav-side.php';
$jenis = $_GET['jenis'];

$getJenis = mysqli_query($conn, "SELECT * FROM dokumen_umum_detail");
?>

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <?php include 'kit/nav-head.php'; ?>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-sm-10">
                                <?php
                                foreach ($getJenis as $key => $value) {
                                    if ($jenis == $value['id_dokumen_umum_detail']) {
                                        echo "<h6>" . $value['jenis_dokumen'] . "</h6>";
                                    }
                                }
                                ?>
                            </div>
                        </div>

                    </div>
                    <div class="card-body px-4 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center text-start mb-3 text-xl">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-center text-primary font-weight-bolder opacity-10">No.</th>
                                        <th class="text-uppercase text-primary font-weight-bolder opacity-10 ps-2">Nama Dokumen</th>
                                        <th class="text-uppercase text-primary font-weight-bolder opacity-10 ps-2">Tanggal Upload</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;                                    
                                    foreach ($getJenis as $key => $value) {
                                        if ($jenis == $value['id_dokumen_umum_detail']) {
                                            $getDoc = mysqli_query($conn, "SELECT * FROM dokumen_umum ORDER BY nama_dokumen ASC");

                                            $row = mysqli_fetch_array($getDoc); ?>
                                            <tr>
                                                <td class="text-center"><?php echo $no++; ?></td>
                                                <td class="text-uppercase text-primary font-weight-bolder opacity-10 ps-2">
                                                    <a href="../../files/arsip/umum/<?php echo $row['files']; ?>" target="_blank">
                                                        <?php echo $row['nama_dokumen']; ?>
                                                    </a>
                                                </td>
                                                <td class="text-uppercase text-primary font-weight-bolder opacity-10 ps-2">
                                                    <?php echo $row['tgl_upload']; ?>
                                                </td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'kit/nav-foot.php'; ?>
</main>
<?php include 'kit/foot.php'; ?>