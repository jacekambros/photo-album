<?php
if((isset($_GET["task"]) && $_GET["task"]) == 'pictures'){
    include_once 'controller/pictures.php';
    $_SESSION['defaultTitle'] = isset($_SESSION['defaultTitle']) ? $_SESSION['defaultTitle'] : 'Brak tytułu';
    $_SESSION['defaultDescription']= isset($_SESSION['defaultDescription']) ? $_SESSION['defaultDescription'] : 'Brak opisu';

    $ob = new pictures_controller();
    $ob->$_GET["action"]($_GET);
} else {
    include_once 'controller/pictures.php';
    $ob = new pictures_controller();
    if($_SESSION['edit'] == 'T') {
        $ob->indexEdit();
    } else {
        $ob->indexShow();
    }

}
