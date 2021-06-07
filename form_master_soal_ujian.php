<?php

include 'init.php';
if(isset($_SESSION['user'])){
    include 'form_content_master_soal_ujian.php';
}else{
    header('location:login.php');
}

?>