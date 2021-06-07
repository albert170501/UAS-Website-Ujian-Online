<?php
    include 'init.php';
    $i = 1;
    $data = $md->getMasterJudulUjian();
    
    if(isset($data)){
        $data = $data;
    }else{
        $data = '';
    }
    
    echo json_encode($data);
?>