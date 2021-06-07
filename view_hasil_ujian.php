<?php

include 'init.php';
if(isset($_SESSION['user'])){
    include 'content_view_hasil_ujian.php';
}else{
    header('location:login.php');
}

?>