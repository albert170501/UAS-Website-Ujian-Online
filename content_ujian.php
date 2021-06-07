<?php

$get_master_user = $md->getMasterUserById($_SESSION['id']);
$getMasterJudulUjian = $md->getMasterJudulUjianByJabatan($_SESSION['jabatan'], $_SESSION['id_kelas']);

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
                                <h1 class="m-0">Jenis Ujian</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Jenis Ujian</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="content">
                    <div class="card card-solid">
                        <div class="card-body pb-0">
                            <div class="row d-flex align-items-stretch">
                                <?php
                                
                                foreach($getMasterJudulUjian as $value){
                                    $dataUjian = $md->getKesempatan($_SESSION['jabatan'], $value[0]);
                                    $getKesempatan = count($md->getKesempatan($_SESSION['jabatan'], $value[0]));
                                    $totalKesempatan = $value[5] - $getKesempatan;
                                ?>
                                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                                    <div class="card bg-light" style="width:100%">
                                        <div class="card-header text-muted border-bottom-0">
                                        &nbsp;
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="row">
                                                <div class="col-7">
                                                <h2 class="lead"><b><?= $value[1] ?></b></h2>
                                                <p class="text-muted text-sm"><b>Deskripsi: </b> <?= $value[2] ?> </p>
                                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-calendar-check"></i></span> Tanggal Awal: <?= date("d M Y", strtotime($value[3])) ?></li>
                                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-calendar-times"></i></span> Tanggal Akhir: <?= date("d M Y", strtotime($value[4])) ?></li>
                                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-dice"></i></span> Kesempatan: <?= $totalKesempatan ?>x</li>
                                                    <?php
                                                    $j=1;
                                                    foreach($dataUjian as $valueDataUjian){ 
                                                        $nilaiUjian = (100 / $valueDataUjian[6]) * $valueDataUjian[7];
                                                    ?>
                                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-pen-fancy"></i></span> <a href="view_hasil_ujian.php?id=<?= $valueDataUjian[0] ?>">Nilai Ujian <?= $j ?> : <?= $nilaiUjian ?></a></li>
                                                    <?php $j++; } ?>
                                                </ul>
                                                </div>
                                                <div class="col-5 text-center">
                                                    <img src="dist/img/exam-icon-png-7.jpeg" alt="" class="img-fluid" width="128">
                                                </div>
                                            </div>
                                        </div>
                                        <?php if(($value[4] >= date("Y-m-d")) && ($totalKesempatan > 0)){ ?>
                                        <div class="card-footer">
                                            <div class="text-right">
                                                <button class="btn btn-sm btn-primary" onclick="mulaiUjian(<?= $value[0] ?>)"><i class="fas fa-pencil-alt"></i> Mulai Ujian</button>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
    <?php require "footer.php"; ?>
</html>

<script>
    function mulaiUjian(id){
        $.ajax({
            url: "ajax_add_header_ujian.php",
            type: "POST",
            data: {id:id},
            success: function(result){
                window.location.href = "mulai_ujian.php?id="+id+"";
            }
        });
    }

</script>