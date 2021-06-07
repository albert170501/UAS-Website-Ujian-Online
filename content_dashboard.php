<?php
$get_master_user = $md->getMasterUserById($_SESSION['id']);
$getDataUjian = $md->getHeaderUjianByUser($_SESSION['id']);
$getKelas = $md->getMasterKelasById($get_master_user[0][10]);

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
                                <h1 class="m-0">Dashboard</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3">
                                <!-- Profile Image -->
                                <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="dist/img/avatar5.png"
                                        alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center"><?= ucwords(strtolower($get_master_user[0][3])) ?></h3>

                                    <p class="text-muted text-center"><?= ucwords(strtolower($get_master_user[0][5])) ?></p>

                                </div>
                                <!-- /.card-body -->
                                </div>
                                <!-- /.card -->

                                <!-- About Me Box -->
                                <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Tentang Saya</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <strong><i class="fas fa-university mr-1"></i> Sekolah</strong>

                                    <p class="text-muted">
                                        <?= ucwords(strtolower($get_master_user[0][8])) ?>
                                    </p>

                                    <hr>
                                    
                                    <strong><i class="fas fa-signal mr-1"></i> Kelas</strong>

                                    <p class="text-muted">
                                        <?= ucwords(strtolower($getKelas[0][1])) ?>
                                    </p>

                                    <hr>

                                    <strong><i class="fas fa-venus-mars mr-1"></i> Jenis Kelamin</strong>

                                    <p class="text-muted"><?= ucwords(strtolower(($get_master_user[0][7] == 1 ? 'Laki-laki' : 'Perempuan'))) ?></p>

                                    <hr>

                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

                                    <p class="text-muted"><?= ucwords(strtolower($get_master_user[0][4])) ?></p>

                                    <hr>

                                    <strong><i class="fas fa-mobile-alt mr-1"></i> Telepon</strong>

                                    <p class="text-muted"><?= ucwords(strtolower($get_master_user[0][6])) ?></p>

                                    <hr>

                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Jurusan</strong>

                                    <p class="text-muted">
                                    <span class="tag tag-danger"><?= ucwords(strtolower($get_master_user[0][9])) ?></span>
                                    </p>

                                    <hr>

                                    <strong><i class="fas fa-football-ball mr-1"></i> Hobi</strong>

                                    <p class="text-muted">
                                    <span class="tag tag-danger"><?= ucwords(strtolower($get_master_user[0][11])) ?></span>
                                    </p>

                                    <hr>

                                    <strong><i class="far fa-file-alt mr-1"></i> Catatan</strong>

                                    <p class="text-muted"><?= ucwords(strtolower($get_master_user[0][12])) ?></p>
                                </div>
                                <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-9">
                                <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Timeline</a></li>
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="timeline">
                                            <!-- The timeline -->
                                            <div class="timeline timeline-inverse">
                                            <!-- timeline time label -->
                                            <?php 
                                            foreach($getDataUjian as $value){ 
                                                $date1=date_create($value[4]);
                                                $date2=date_create(date("Y-m-d"));
                                                $diff=date_diff($date1,$date2);

                                                $nilaiUjian = (100 / $value[6]) * $value[7];
                                            ?>
                                            <div class="time-label">
                                                <span class="bg-danger">
                                                <?= date("d M Y H:i:s", strtotime($value[4])) ?>
                                                </span>
                                            </div>
                                            <div>
                                                <i class="fas fa-pencil-alt bg-warning"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> <?= $diff->format("%R%a days") ?></span>

                                                    <h3 class="timeline-header"><a href="#"><?= $value[10] ?></a></h3>

                                                    <div class="timeline-body">
                                                        Nilai : <?= $nilaiUjian ?>
                                                        <br>
                                                        Tema : <?= $value[11] ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            <div>
                                                <i class="far fa-clock bg-gray"></i>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.tab-content -->
                                </div><!-- /.card-body -->
                                </div>
                                <!-- /.nav-tabs-custom -->
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                </section>
            </div>
            <footer class="main-footer">
                <strong>2021</strong>
                <div class="float-right d-none d-sm-inline-block">
                        <b>Ujian Online</b>
                </div>
            </footer>
        </div>
    </body>
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
</html>