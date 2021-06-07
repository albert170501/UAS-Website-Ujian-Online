<?php
include 'init.php';

$data[1]    = $_POST['username'];
$data[2]    = md5($_POST['password']);
$data[3]    = $_POST['nama'];
$data[4]    = $_POST['alamat'];
$data[5]    = $_POST['email'];
$data[6]    = $_POST['telepon'];
$data[7]    = $_POST['kelamin'];
$data[8]    = $_POST['sekolah'];
$data[9]    = $_POST['jurusan'];
$data[10]   = $_POST['kelas'];
$data[11]   = $_POST['hobi'];
$data[12]   = $_POST['catatan'];
$data[13]   = $_POST['role'];

if($_POST['id'] > 0){
    $id             = $_POST['id'];
    $dataAwal = $md->getMasterUserById($id);
    
    if($dataAwal[0][2] == $_POST['password']){
        $data[2]    = $dataAwal[0][2];
    }else{
        $data[2]    = md5($_POST['password']);
    }

    $md->updateMasterUser($id, $data);
}else{
    $md->addMasterUser($data);
}

header('location:master_user.php');
?>