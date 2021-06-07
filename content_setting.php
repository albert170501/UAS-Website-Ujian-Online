<?php
$get_master_user = $md->getMasterUserById($_SESSION['id']);
$get_kelas = $md->getMasterKelas();
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
                                <h1 class="m-0">Pengaturan</h1>
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
                            <!-- /.col -->
                            <div class="col-md-12">
                                <div class="card">
                                <div class="card-body">
                                    <div class="tab-content">
                                    <div class="active tab-pane" id="settings">
                                        <form class="form-horizontal" action="save_setting.php" method="POST" autocomplete="off">
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Username</label>
                                                <div class="col-sm-10">
                                                <input type="text" class="form-control" id="username" name="username" value="<?= $get_master_user[0][1] ?>" placeholder="Username" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Password</label>
                                                <div class="col-sm-10">
                                                <input type="password" class="form-control" id="password" name="password" value="<?= $get_master_user[0][2] ?>" placeholder="Password" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                                                <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $get_master_user[0][3] ?>" placeholder="Nama" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                <input type="email" class="form-control" id="email" name="email" value="<?= $get_master_user[0][5] ?>" placeholder="Email" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-2 col-form-label">Sekolah</label>
                                                <div class="col-sm-10">
                                                <input type="text" class="form-control" id="sekolah" name="sekolah" value="<?= $get_master_user[0][8] ?>" placeholder="Universitas" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-2 col-form-label">Kelas</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" disabled>
                                                        <option value="">Pilih</option>
                                                        <?php
                                                        foreach($get_kelas as $valueKelas){
                                                            echo '<option value="'.$valueKelas[0].'" '.($valueKelas[0] == $get_master_user[0][10] ? 'selected' : '').'>'.$valueKelas[1].'</option>';
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
                                                    <option value="1" <?= ($get_master_user[0][7] == 1 ? 'selected' : '') ?>>Laki-laki</option>
                                                    <option value="2" <?= ($get_master_user[0][7] == 2 ? 'selected' : '') ?>>Perepuan</option>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">alamat</label>
                                                <div class="col-sm-10">
                                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $get_master_user[0][4] ?>" placeholder="Alamat" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">Telepon</label>
                                                <div class="col-sm-10">
                                                <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $get_master_user[0][6] ?>" placeholder="Telepon" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">Jurusan</label>
                                                <div class="col-sm-10">
                                                <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?= $get_master_user[0][9] ?>" placeholder="Jurusan" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">Hobi</label>
                                                <div class="col-sm-10">
                                                <input type="text" class="form-control" id="hobi" name="hobi" value="<?= $get_master_user[0][11] ?>" placeholder="Hobi" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">Catatan</label>
                                                <div class="col-sm-10">
                                                <textarea class="form-control" id="catatan" name="catatan" placeholder="Catatan"><?= $get_master_user[0][12] ?></textarea>
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