<?php

$id         = '';
$nama       = '';
$deskripsi  = '';
$kelas      = '';
$tanggalAwal    = date("Y-m-d");
$tanggalAkhir   = date("Y-m-d");
$durasi         = '';
$kesempatan     = '';
$warna          = '';
$dataKelas  = $md->getMasterKelas();
$action     = "Tambah";
if(isset($_GET['id'])){
    $id     = $_GET['id'];
    $action = "Perbarui";
    $data   = $md->getMasterJudulUjianById($id);
    $nama   = $data[0][1];
    $deskripsi      = $data[0][2];
    $kelas          = $data[0][3];
    $tanggalAwal    = $data[0][4];
    $tanggalAkhir   = $data[0][5];
    $durasi         = $data[0][6];
    $kesempatan     = $data[0][7];
    $warna          = $data[0][8];
}

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
                                <h1 class="m-0"><?= $action ?> Master Judul Ujian</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Master Judul Ujian</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-md-12">
                                <div class="card">
                                <div class="card-body">
                                    <div class="tab-content">
                                    <div class="active tab-pane" id="settings">
                                        <form class="form-horizontal" action="save_master_judul_ujian.php" method="POST" autocomplete="off">
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="hidden" name="id" value="<?= $id ?>">
                                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $nama ?>" placeholder="Nama" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= $deskripsi ?>" placeholder="Deskripsi" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="kelas" name="kelas" required>
                                                    <option value="">Pilih</option>
                                                    <?php
                                                        foreach($dataKelas as $value){
                                                            echo "<option value='".$value[0]."' ".($value[0] == $kelas ? 'selected' : '').">".$value[1]."</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tanggalAwal" class="col-sm-2 col-form-label">Tanggal Awal</label>
                                            <div class="col-sm-10">
                                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" id="tanggalAwal" name="tanggalAwal" value="<?= date("m-d-Y", strtotime($tanggalAwal)) ?>" placeholder="tanggalAwal" required/>
                                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tanggalAkhir" class="col-sm-2 col-form-label">Tanggal Akhir</label>
                                            <div class="col-sm-10">
                                                <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate2" id="tanggalAkhir" name="tanggalAkhir" value="<?= date("m-d-Y", strtotime($tanggalAkhir)) ?>" placeholder="tanggalAkhir" required/>
                                                    <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tanggal" class="col-sm-2 col-form-label">Durasi</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" id="durasi" name="durasi" value="<?= $durasi ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" placeholder="Menit" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tanggal" class="col-sm-2 col-form-label">Kesempatan</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" id="kesempatan" name="kesempatan" value="<?= $kesempatan ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" placeholder="Berapa kali" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tanggal" class="col-sm-2 col-form-label">Warna</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="color" id="warna" name="warna" value="<?= $warna ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
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
            <?php require "footer.php"; ?>
</html>