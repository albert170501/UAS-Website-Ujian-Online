<?php

include 'init.php';
if(isset($_SESSION['user'])){
    include 'content_mulai_ujian.php';
}else{
    header('location:login.php');
}

?>