<?php

$id = '';
$action = "Tambah";
$get_kelas = $md->getMasterKelas();
$username   = '';
$password   = '';
$nama2       = '';
$email      = '';
$sekolah    = '';
$kelas      = '';
$kelamin    = '';
$alamat     = '';
$telepon    = '';
$jurusan    = '';
$hobi       = '';
$catatan    = '';
$role       = '';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $action = "Perbarui";
    $get_master_user = $md->getMasterUserById($id);
    $username   = $get_master_user[0][1];
    $password   = $get_master_user[0][2];
    $nama2       = $get_master_user[0][3];
    $email      = $get_master_user[0][5];
    $sekolah    = $get_master_user[0][8];
    $kelas      = $get_master_user[0][10];
    $kelamin    = $get_master_user[0][7];
    $alamat     = $get_master_user[0][4];
    $telepon    = $get_master_user[0][6];
    $jurusan    = $get_master_user[0][9];
    $hobi       = $get_master_user[0][11];
    $catatan    = $get_master_user[0][12];
    $role       = $get_master_user[0][13];
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
                                <h1 class="m-0"><?= $action ?> Master User</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Master Kelas</li>
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
                                        <form class="form-horizontal" action="save_master_user.php" method="POST" autocomplete="off">
                                        <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Username</label>
                                                <div class="col-sm-10">
                                                    <input type="hidden" name="id" value="<?= $id ?>">
                                                    <input type="text" class="form-control" id="username" name="username" value="<?= $username ?>" placeholder="Username" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" id="password" name="password" value="<?= $password ?>" placeholder="Password" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $nama2 ?>" placeholder="Nama" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" id="email" name="email" value="<?= $email ?>" placeholder="Email" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-2 col-form-label">Sekolah</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="sekolah" name="sekolah" value="<?= $sekolah ?>" placeholder="Sekolah" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-2 col-form-label">Kelas</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="kelas" id="kelas">
                                                        <option value="">Pilih</option>
                                                        <?php
                                                        foreach($get_kelas as $valueKelas){
                                                            echo '<option value="'.$valueKelas[0].'" '.($valueKelas[0] == $kelas ? 'selected' : '').'>'.$valueKelas[1].'</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputExperience" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" id="kelamin" name="kelamin" required>
                                                        <option value="">Pilih</option>
                                                        <option value="1" <?= ($kelamin == 1 ? 'selected' : '') ?>>Laki-laki</option>
                                                        <option value="2" <?= ($kelamin == 2 ? 'selected' : '') ?>>Perepuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">alamat</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $alamat ?>" placeholder="Alamat" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">Telepon</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $telepon ?>" placeholder="Telepon" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">Jurusan</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?= $jurusan ?>" placeholder="Jurusan" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">Hobi</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="hobi" name="hobi" value="<?= $hobi ?>" placeholder="Hobi" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">Catatan</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" id="catatan" name="catatan" placeholder="Catatan"><?= $catatan ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">Role</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="role" id="role" placeholder="Pilih" required>
                                                        <option value="">Pilih</option>
                                                        <option value="1" <?= ($role == 1 ? 'selected' : '') ?>>Admin</option>
                                                        <option value="2" <?= ($role == 2 ? 'selected' : '') ?>>Siswa</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
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