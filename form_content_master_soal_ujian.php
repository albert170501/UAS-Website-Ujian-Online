<?php

$id         = '';
$nama       = '';
$kelas      = '';
$tanggal    = '';
$dataKelas  = $md->getMasterKelas();
$action     = "Tambah";
$dataJudulUjian = $md->getMasterJudulUjian();
$id_master_ujian    = '';
$soal               = '';
$soal_gambar        = '';
$pilihan_a          = '';
$pilihan_a_gambar   = '';
$pilihan_b          = '';
$pilihan_b_gambar   = '';
$pilihan_c          = '';
$pilihan_c_gambar   = '';
$pilihan_d          = '';
$pilihan_d_gambar   = '';
$jawaban            = '';
if(isset($_GET['id'])){
    $id     = $_GET['id'];
    $action = "Perbarui";
    $data   = $md->getMasterSoalUjianById($id);
    $id_master_ujian    = $data[0][1];
    $soal               = $data[0][2];
    $soal_gambar        = $data[0][3];
    $pilihan_a          = $data[0][4];
    $pilihan_a_gambar   = $data[0][5];
    $pilihan_b          = $data[0][6];
    $pilihan_b_gambar   = $data[0][7];
    $pilihan_c          = $data[0][8];
    $pilihan_c_gambar   = $data[0][9];
    $pilihan_d          = $data[0][10];
    $pilihan_d_gambar   = $data[0][11];
    $jawaban            = $data[0][12];
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
                                <h1 class="m-0"><?= $action ?> Master Soal Ujian</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Master Soal Ujian</li>
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
                                        <form class="form-horizontal" action="save_master_soal_ujian.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-2 col-form-label">Judul Ujian</label>
                                            <div class="col-sm-10">
                                                <input type="hidden" name="id" value="<?= $id ?>" required>
                                                <select class="form-control" name="judul_ujian" id="judul_ujian">
                                                    <option value="">Pilih</option>
                                                    <?php
                                                    foreach($dataJudulUjian as $value){
                                                        echo '<option value="'.$value[0].'" '.($id_master_ujian == $value[0] ? 'selected' : '').'>'.$value[1].' - '.$value[2].'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-2 col-form-label">Soal</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="soal" name="soal" cols="30" rows="5" placeholder="Input Soal" required><?= $soal ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-2 col-form-label">Soal Gambar</label>
                                            <div class="col-sm-10">
                                                <input class="form-control-file" id="soal_gambar" name="soal_gambar" type="file" accept="image/*">
                                                <img class="img-thumbnail" src="<?= $soal_gambar ?>" alt="" style= "width: 25%; margin-top:5px">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-2 col-form-label">Pilihan A</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="pilihan_a" name="pilihan_a" cols="30" rows="5" placeholder="Input Soal" required><?= $pilihan_a ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-2 col-form-label">Pilihan A Gambar</label>
                                            <div class="col-sm-10">
                                                <input class="form-control-file" id="pilihan_a_gambar" name="pilihan_a_gambar" type="file" accept="image/*">
                                                <img class="img-thumbnail" src="<?= $pilihan_a_gambar ?>" alt="" style= "width: 25%; margin-top:5px">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-2 col-form-label">Pilihan B</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="pilihan_b" name="pilihan_b" cols="30" rows="5" placeholder="Input Soal" required><?= $pilihan_b ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-2 col-form-label">Pilihan B Gambar</label>
                                            <div class="col-sm-10">
                                                <input class="form-control-file" id="pilihan_b_gambar" name="pilihan_b_gambar" type="file" accept="image/*">
                                                <img class="img-thumbnail" src="<?= $pilihan_b_gambar ?>" alt="" style= "width: 25%; margin-top:5px">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-2 col-form-label">Pilihan C</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="pilihan_c" name="pilihan_c" cols="30" rows="5" placeholder="Input Soal" required><?= $pilihan_c ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-2 col-form-label">Pilihan C Gambar</label>
                                            <div class="col-sm-10">
                                                <input class="form-control-file" id="pilihan_c_gambar" name="pilihan_c_gambar" type="file" accept="image/*">
                                                <img class="img-thumbnail" src="<?= $pilihan_c_gambar ?>" alt="" style= "width: 25%; margin-top:5px">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-2 col-form-label">Pilihan D</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="pilihan_d" name="pilihan_d" cols="30" rows="5" placeholder="Input Soal" required><?= $pilihan_d ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-2 col-form-label">Pilihan D Gambar</label>
                                            <div class="col-sm-10">
                                                <input class="form-control-file" id="pilihan_d_gambar" name="pilihan_d_gambar" type="file" accept="image/*">
                                                <img class="img-thumbnail" src="<?= $pilihan_d_gambar ?>" alt="" style= "width: 25%; margin-top:5px">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-2 col-form-label">Jawaban Benar</label>
                                            <div class="col-sm-10">
                                                <input type="hidden" name="id" value="<?= $id ?>" required>
                                                <select class="form-control" name="jawaban" id="jawaban" required>
                                                    <option value="">Pilih</option>
                                                    <?php
                                                    $pilihanJawaban = [1 => 'A', 2 => 'B', 3 => 'C', 4 => 'D'];
                                                    foreach($pilihanJawaban as $key => $value){
                                                        echo '<option value="'.$key.'" '.($jawaban == $key ? 'selected' : '').'>'.$value.'</option>';
                                                    }
                                                    ?>
                                                </select>
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