<?php

include 'init.php';
if(isset($_SESSION['user'])){
    include 'content_dashboard.php';
}else{
    header('location:login.php');
}

?>