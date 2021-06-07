<?php

include 'init.php';
if(isset($_SESSION['user'])){
    include 'form_content_master_user.php';
}else{
    header('location:login.php');
}

?>