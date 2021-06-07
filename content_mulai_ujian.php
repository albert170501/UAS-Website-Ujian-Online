<?php
$getMasterJudulUjian = $md->getMasterJudulUjianById($_GET['id']);
$getMasterSoalUjian = $md->getMasterSoalUjianByIdMasterJudulujian($_GET['id']);
$getHeaderUjian = $md->getHeaderUjian($_SESSION['id']);

?>
<!DOCTYPE html>
<html>
<title>Ujian Sekolah</title>
    <?php require "header.php"; ?>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
            </div>
            <?php require "navbar.php"; ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
            <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0"><?= $getMasterJudulUjian[0][1] ?></h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Ujian</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="content">
                    <div class="card card-solid">
                        <div class="card-body pb-0">
                            <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">
                                <div class="row">
                                    <div class="col-12 col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Jumlah Soal</span>
                                            <span class="info-box-number text-center text-muted mb-0"><?= count($getMasterSoalUjian) ?></span>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Waktu Berakhir</span>
                                            <span class="info-box-number text-center text-muted mb-0"><?= date("d M Y", strtotime($getHeaderUjian[0][1])) ?></span>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Sisa Waktu</span>
                                            <span class="info-box-number text-center text-muted mb-0" id="sisaWaktu"> - <span>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <form action="save_ujian.php" method="POST">
                                    <div class="row">
                                        <div class="col-12">
                                        <h4>Soal</h4>
                                            <?php 
                                            $i = 1;
                                            foreach($getMasterSoalUjian as $value){ ?>
                                            <div class="post">
                                                
                                                <!-- /.user-block -->
                                                <p><b>
                                                <?= $i.'. '.$value[2] ?>
                                                </b></p>

                                                <div class="col-sm-6">
                                                    <!-- radio -->
                                                    <div class="form-group">
                                                        <div class="custom-control custom-radio">
                                                            <input class="custom-control-input" type="radio" id="customRadio<?= $i ?>-a" name="pilihan<?= $i ?>" value="1">
                                                            <label for="customRadio<?= $i ?>-a" class="custom-control-label"><?= $value[4] ?></label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input class="custom-control-input" type="radio" id="customRadio<?= $i ?>-b" name="pilihan<?= $i ?>" value="2">
                                                            <label for="customRadio<?= $i ?>-b" class="custom-control-label"><?= $value[6] ?></label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input class="custom-control-input" type="radio" id="customRadio<?= $i ?>-c" name="pilihan<?= $i ?>" value="3">
                                                            <label for="customRadio<?= $i ?>-c" class="custom-control-label"><?= $value[8] ?></label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input class="custom-control-input" type="radio" id="customRadio<?= $i ?>-d" name="pilihan<?= $i ?>" value="4">
                                                            <label for="customRadio<?= $i ?>-d" class="custom-control-label"><?= $value[10] ?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $i++; } ?>
                                        </div>
                                    </div>
                                    <br><br>
                                    <p><input type="submit" class="btn btn-primary" value="Simpan"></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
    <?php require "footer.php"; ?>
</html>

<script>
$(document).ready(function() {
    // Set the date we're counting down to
    var tanggal = "<?= date("Y-m-d H:i:s", strtotime($getHeaderUjian[0][2])) ?>";
    var countDownDate = new Date(tanggal).getTime();
    // Update the count down every 1 second
    var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();
        
    // Find the distance between now and the count down date
    var distance = countDownDate - now;
        
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var jam = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var menit = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var detik = Math.floor((distance % (1000 * 60)) / 1000);
        
    // Output the result in an element with id="demo"
    document.getElementById("sisaWaktu").innerHTML = jam + "j "
    + menit + "m " + detik + "s ";
        
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("sisaWaktu").innerHTML = "WAKTU HABIS";
        $("form").submit();
    }
    }, 1000);
    
});
</script>