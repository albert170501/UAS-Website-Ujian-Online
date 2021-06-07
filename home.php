<?php

include 'init.php';
if(isset($_SESSION['user'])){
    include 'content_home.php';
}else{
    header('location:login.php');
}

?>