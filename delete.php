<?php
include 'init.php';

$id = $_GET['id'];
$source = $_GET['source'];

if($source == 'user'){
    $tabel = 'master_user';    
    $md->hapusData($id, $tabel);

    header('location:master_user.php');
}else if($source == 'judulUjian'){
    $tabel = 'master_judul_ujian';    
    $md->hapusData($id, $tabel);

    header('location:master_judul_ujian.php');
}else if($source == 'soalUjian'){
    $tabel = 'master_soal_ujian';    
    $md->hapusData($id, $tabel);

    header('location:master_soal_ujian.php');
}else if($source == 'kelas'){
    $tabel = 'master_kelas';    
    $md->hapusData($id, $tabel);

    header('location:master_kelas.php');
}



?>