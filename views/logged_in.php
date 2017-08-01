<?php
if((isset($_GET["task"]) && $_GET["task"]) == 'pictures'){
    include_once 'controller/pictures.php';
    $_SESSION['defaultTitle']='Brak tytułu';
    $_SESSION['defaultDescription']='Brak opisu';
    $ob = new pictures_controller();
    $ob->$_GET["action"]();
} else {
    include_once 'controller/pictures.php';
    $ob = new pictures_controller();
    $ob->index();
}
