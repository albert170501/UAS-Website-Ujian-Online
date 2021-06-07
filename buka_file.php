<?php
$jsondata = file_get_contents("temp.json");
$json = json_decode($jsondata, true);
if($md->cekArray($json, $_SESSION['user']) > 0){
    include "resend.php";
}

if($_GET){
    switch($_GET['page']){
        case '':
            if(!file_exists("home.php"))
            die("Cannot Access Page!");
            include "home.php";
            break;
    }
}

?>