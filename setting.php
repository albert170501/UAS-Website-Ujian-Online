<?php

include 'init.php';
if(isset($_SESSION['user'])){
    include 'content_setting.php';
}else{
    header('location:login.php');
}

?>