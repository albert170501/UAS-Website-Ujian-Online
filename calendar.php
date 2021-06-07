<?php

include 'init.php';
if(isset($_SESSION['user'])){
    include 'content_calendar.php';
}else{
    header('location:login.php');
}

?>