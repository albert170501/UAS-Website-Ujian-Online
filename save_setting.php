<?php
include 'init.php';

$id             = $_SESSION['id'];
$password       = md5($_POST['password']);
$nama           = $_POST['nama'];
$email          = $_POST['email'];
$sekolah        = $_POST['sekolah'];
$kelamin        = $_POST['kelamin'];
$alamat         = $_POST['alamat'];
$telepon        = $_POST['telepon'];
$jurusan        = $_POST['jurusan'];
$hobi           = $_POST['hobi'];
$catatan        = $_POST['catatan'];

$dataAwal = $md->getMasterUserById($id);

if($dataAwal[0][2] == $_POST['password']){
    $password    = $dataAwal[0][2];
}else{
    $password    = md5($_POST['password']);
}

$md->saveSetting($id, $password, $nama, $email, $sekolah, $kelamin, $alamat, $telepon, $jurusan, $hobi, $catatan);

header('location:setting.php');
?>