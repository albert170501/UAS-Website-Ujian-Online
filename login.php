<?php
include 'init.php';
unset($_SESSION['user']);
if(isset($_SESSION['user'])){
  header('location: home.php');
}

if(isset($_POST['btnSubmit'])){
  $username = $_POST['username'];
  $password =  md5($_POST['password']);
  $loginUser = $md->login($username,$password);
  // echo $loginUser['ID_LOG_USER'];
  // echo '<p>'.$md->login($username,$password).'</p>';

  if($md->login($username,$password)){
    if(!isset($_SESSION['user'])){
      $_SESSION['user']       = $loginUser['username'];
      $_SESSION['nama']       = $loginUser['nama'];
      $_SESSION['id']         = $loginUser['id'];
      $_SESSION['id_kelas']   = $loginUser['id_master_kelas'];
      $_SESSION['jabatan']    = $loginUser['id_master_jabatan'];
    }
    header('location: home.php');
  }
}

// die();
include 'content_login.php';
?>