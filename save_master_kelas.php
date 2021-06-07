<?php
include 'init.php';

if($_POST['id'] > 0){
    $id             = $_POST['id'];
    $nama           = $_POST['nama'];

    $md->updateMasterKelas($id, $nama);
}else{
    $nama           = $_POST['nama'];

    $md->addMasterKelas($nama);
}

header('location:master_kelas.php');
?>