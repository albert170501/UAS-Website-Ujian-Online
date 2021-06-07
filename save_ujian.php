<?php
include 'init.php';

$getHeaderUjian = $md->getHeaderUjian($_SESSION['id']);
$getMasterSoalUjian = $md->getMasterSoalUjianByIdMasterJudulujian($getHeaderUjian[0][3]);

$i = 1;
$jawabanBenar = 0;
foreach($getMasterSoalUjian as $value){
    $data[0] = $getHeaderUjian[0][0];
    $data[1] = $value[2];
    $data[2] = $value[3];
    $data[3] = $value[4];
    $data[4] = $value[5];
    $data[5] = $value[6];
    $data[6] = $value[7];
    $data[7] = $value[8];
    $data[8] = $value[9];
    $data[9] = $value[10];
    $data[10] = $value[11];
    $data[11] = $value[12];
    if(isset($_POST['pilihan'.$i.''])){
        $data[12] = $_POST['pilihan'.$i.''];
        $jawabanUser = $_POST['pilihan'.$i.''];
    }else{
        $data[12] = 0;
        $jawabanUser = 0;
    }
    
    if($value[12] == $jawabanUser){
        $jawabanBenar = $jawabanBenar+1;
    }
    $md->addDetailUjian($data);
    $i++;
}

$totalSoal = count($getMasterSoalUjian);

$md->updateHeaderUjian($_SESSION['id'], $totalSoal, $jawabanBenar);

header('location:ujian.php');
?>