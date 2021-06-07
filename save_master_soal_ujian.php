<?php
include 'init.php';

$t = microtime(true);
$micro = sprintf("%06d",($t - floor($t)) * 1000000);
$d = new \DateTime( date('Y-m-d H:i:s.'.$micro, $t) );

$target_dir = "upload_images/";

$soal_gambar = $target_dir . $d->format("YmdHisu").'_'.basename($_FILES["soal_gambar"]["name"]);
move_uploaded_file($_FILES["soal_gambar"]["tmp_name"], $soal_gambar);

$pilihan_a_gambar = $target_dir . $d->format("YmdHisu").'_'.basename($_FILES["pilihan_a_gambar"]["name"]);
move_uploaded_file($_FILES["pilihan_a_gambar"]["tmp_name"], $pilihan_a_gambar);

$pilihan_b_gambar = $target_dir . $d->format("YmdHisu").'_'.basename($_FILES["pilihan_b_gambar"]["name"]);
move_uploaded_file($_FILES["pilihan_b_gambar"]["tmp_name"], $pilihan_b_gambar);

$pilihan_c_gambar = $target_dir . $d->format("YmdHisu").'_'.basename($_FILES["pilihan_c_gambar"]["name"]);
move_uploaded_file($_FILES["pilihan_c_gambar"]["tmp_name"], $pilihan_c_gambar);

$pilihan_d_gambar = $target_dir . $d->format("YmdHisu").'_'.basename($_FILES["pilihan_d_gambar"]["name"]);
move_uploaded_file($_FILES["pilihan_d_gambar"]["tmp_name"], $pilihan_d_gambar);

$data[0]    = $_POST['judul_ujian'];
$data[1]    = $_POST['soal'];
$data[3]    = $_POST['pilihan_a'];
$data[5]    = $_POST['pilihan_b'];
$data[7]    = $_POST['pilihan_c'];
$data[9]    = $_POST['pilihan_d'];
$data[11]   = $_POST['jawaban'];

if($_POST['id'] > 0){
    $id = $_POST['id'];
    $dataSoal   = $md->getMasterSoalUjianById($id);
    $soal_gambar_awal        = $dataSoal[0][3];
    $pilihan_a_gambar_awal   = $dataSoal[0][5];
    $pilihan_b_gambar_awal   = $dataSoal[0][7];
    $pilihan_c_gambar_awal   = $dataSoal[0][9];
    $pilihan_d_gambar_awal   = $dataSoal[0][11];

    if($_FILES["soal_gambar"]["name"]){
        $data[2]    = $soal_gambar;
        if($soal_gambar_awal){
            unlink($target_dir.'/'.$soal_gambar_awal);
        }
    }else{
        $data[2]    = $soal_gambar_awal;
    }
    
    if($_FILES["pilihan_a_gambar"]["name"]){
        $data[4]    = $pilihan_a_gambar;
        if($soal_gambar_awal){
            unlink($target_dir.'/'.$pilihan_a_gambar_awal);
        }
    }else{
        $data[4]    = $pilihan_a_gambar_awal;
    }

    if($_FILES["pilihan_b_gambar"]["name"]){
        $data[6]    = $pilihan_b_gambar;
        if($pilihan_b_gambar_awal){
            unlink($target_dir.'/'.$pilihan_b_gambar_awal);
        }
    }else{
        $data[6]    = $pilihan_b_gambar_awal;
    }

    if($_FILES["pilihan_c_gambar"]["name"]){
        $data[8]    = $pilihan_c_gambar;
        if($pilihan_c_gambar_awal){
            unlink($target_dir.'/'.$pilihan_c_gambar_awal);
        }
    }else{
        $data[8]    = $pilihan_c_gambar_awal;
    }

    if($_FILES["pilihan_d_gambar"]["name"]){
        $data[10]    = $pilihan_d_gambar;
        if($pilihan_d_gambar_awal){
            unlink($target_dir.'/'.$pilihan_d_gambar_awal);
        }
    }else{
        $data[10]    = $pilihan_d_gambar_awal;
    }

    $md->updateMasterSoalUjian($data, $id);
}else{
    $data[2]    = ($_FILES["soal_gambar"]["name"] ? $soal_gambar : '');
    $data[4]    = ($_FILES["pilihan_a_gambar"]["name"] ? $pilihan_a_gambar : '');
    $data[6]    = ($_FILES["pilihan_b_gambar"]["name"] ? $pilihan_b_gambar : '');
    $data[8]    = ($_FILES["pilihan_c_gambar"]["name"] ? $pilihan_c_gambar : '');
    $data[10]   = ($_FILES["pilihan_d_gambar"]["name"] ? $pilihan_d_gambar : '');
    $md->addMasterSoalUjian($data);
}
// die();
header('location:master_soal_ujian.php');
?>