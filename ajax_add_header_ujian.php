<?php
include 'init.php';
$id = $_POST['id'];

$md->setStatusHeaderUjian($_SESSION['id']);
$jamAkhir = date("H:i:s", strtotime("+20minutes"));
$md->addHeaderUjian($_SESSION['id'], $_SESSION['id_kelas'], $id, $jamAkhir);
?>