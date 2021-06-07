<?php
include 'init.php';

$nama       = $_POST['nama'];
$deskripsi  = $_POST['deskripsi'];
$kelas      = $_POST['kelas'];
$tanggalAwal    = date("Y-m-d", strtotime($_POST['tanggalAwal']));
$tanggalAkhir   = date("Y-m-d", strtotime($_POST['tanggalAkhir']));
$durasi         = $_POST['durasi'];
$kesempatan     = $_POST['kesempatan'];
$warna          = $_POST['warna'];

if($_POST['id'] > 0){
    $id         = $_POST['id'];

    $md->updateMasterJudulUjian($id, $nama, $deskripsi, $kelas, $tanggalAwal, $tanggalAkhir, $durasi, $kesempatan, $warna);
}else{
    $md->addMasterJudulUjian($nama, $deskripsi, $kelas, $tanggalAwal, $tanggalAkhir, $durasi, $kesempatan, $warna);
}

header('location:master_judul_ujian.php');
?>