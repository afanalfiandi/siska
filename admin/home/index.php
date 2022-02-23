<?php
include 'template/head.php';
include 'template/header.php';
include 'api/getData.php';
$table = mysqli_query($conn, "SELECT table_name FROM information_schema.tables WHERE table_schema = 'apk_siska';");
?>

<section class="content-header">
    <h1>
        <i class="fa fa-dashboard"></i> Dashboard
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <?php
        while ($row = mysqli_fetch_array($table)) {
            $sql = mysqli_query($conn, "SELECT COUNT(*) as total FROM " . $row['table_name'] . "");
            $result = mysqli_fetch_array($sql);
        ?>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-aqua">
                    <span class="info-box-icon"><i class="fa fa-user"></i></span>
                    <div class="info-box-content">
                        <?php if ($row['table_name'] == 'berita_detail') {
                            $tujuan = "tujuan_berita";
                        ?>
                            <span class="info-box-text"><?php echo preg_replace('/_detail/', '', $tujuan); ?></span>
                        <?php } else { ?>
                            <span class="info-box-text"><?php echo preg_replace('/_detail/', '', $row['table_name']); ?></span>
                        <?php } ?>
                        <span class="info-box-number"><?php echo $result['total'] ?></span>
                        <div class="progress">
                            <div class="progress-bar" style="width: 99%"></div>
                        </div>
                        <span class="progress-description">
                            <?php if ($row['table_name'] == 'berita_detail') {
                                $tujuan = "tujuan_berita";
                            ?>
                                <span class="info-box-text">
                                    <a class="link" href="page/<?php echo preg_replace('/_detail/', '', $tujuan); ?>"> View Details <i class="fa fa-arrow-circle-right"></i></a>
                                </span>
                            <?php } else { ?>
                                <a class="link" href="page/<?php echo preg_replace('/_detail/', '', $row['table_name']); ?>"> View Details <i class="fa fa-arrow-circle-right"></i></a>
                            <?php } ?>

                        </span>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <!-- ./wrapper -->
    <?php include 'template/footer.php'; ?>