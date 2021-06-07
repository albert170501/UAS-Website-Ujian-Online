<?php

$getHeaderUjian = $md->getHeaderUjianById($_GET['id']);
$nilaiUjian = (100 / $getHeaderUjian[0][6]) * $getHeaderUjian[0][7];
$tanggalUjian = date("d M Y H:i:s", strtotime($getHeaderUjian[0][4]));
$getMasterJudulUjian = $md->getMasterJudulUjianById($getHeaderUjian[0][3]);
$getMasterSoalUjian = $md->getDetailHasilUjian($_GET['id']);

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
                                            <span class="info-box-text text-center text-muted">Nilai</span>
                                            <span class="info-box-number text-center text-muted mb-0"><?= $nilaiUjian ?></span>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Tanggal Ujian</span>
                                            <span class="info-box-number text-center text-muted mb-0" id="sisaWaktu"> <?= $tanggalUjian ?> <span>
                                        </div>
                                    </div>
                                    </div>
                                </div>
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
                                            <?php if(!empty($value[3])){ ?>
                                            <div style="text-align:center">
                                                <img src="<?= $value[3] ?>" width="500">
                                            </div>
                                            <?php } ?>
                                            
                                            <div class="col-sm-6">
                                                <!-- radio -->
                                                <div class="form-group">
                                                    <div class="custom-control custom-radio">
                                                        <input class="custom-control-input" type="radio" id="customRadio<?= $i ?>-a" name="pilihan<?= $i ?>" value="1" <?= ($value[13] == 1 ? 'checked' : '') ?> disabled>
                                                        <label for="customRadio<?= $i ?>-a" class="custom-control-label"><?= $value[4] ?> <?= ($value[12] == 1 ? '<i class="fas fa-check" style="color:#28a745"></i>' : '') ?> </label>
                                                        <?php if(!empty($value[5])){ ?>
                                                        <p><img src="<?= $value[5] ?>" width="300"></p>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input class="custom-control-input" type="radio" id="customRadio<?= $i ?>-b" name="pilihan<?= $i ?>" value="2" <?= ($value[13] == 2 ? 'checked' : '') ?> disabled>
                                                        <label for="customRadio<?= $i ?>-b" class="custom-control-label"><?= $value[6] ?> <?= ($value[12] == 2 ? '<i class="fas fa-check" style="color:#28a745"></i>' : '') ?></label>
                                                        <?php if(!empty($value[7])){ ?>
                                                        <p><img src="<?= $value[7] ?>" width="300"></p>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input class="custom-control-input" type="radio" id="customRadio<?= $i ?>-c" name="pilihan<?= $i ?>" value="3" <?= ($value[13] == 3 ? 'checked' : '') ?> disabled>
                                                        <label for="customRadio<?= $i ?>-c" class="custom-control-label"><?= $value[8] ?> <?= ($value[12] == 3 ? '<i class="fas fa-check" style="color:#28a745"></i>' : '') ?></label>
                                                        <?php if(!empty($value[9])){ ?>
                                                        <p><img src="<?= $value[9] ?>" width="300"></p>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input class="custom-control-input" type="radio" id="customRadio<?= $i ?>-d" name="pilihan<?= $i ?>" value="4" <?= ($value[13] == 4 ? 'checked' : '') ?> disabled>
                                                        <label for="customRadio<?= $i ?>-d" class="custom-control-label is-valid"><?= $value[10] ?> <?= ($value[12] == 4 ? '<i class="fas fa-check" style="color:#28a745"></i>' : '') ?></label>
                                                        <?php if(!empty($value[11])){ ?>
                                                        <p><img src="<?= $value[11] ?>" width="300"></p>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $i++; } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
    <?php require "footer.php"; ?>
</html>