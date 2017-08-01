<?php

/**
 * Created by PhpStorm.
 * User: cgpe
 * Date: 2017-07-25
 * Time: 15:31
 */

include 'view/view.php';

class pictures_view extends View
{
    public function index(){
        $pic = $this->loadModel('pictures');
        $this->set('pictures', $pic->getAll());
        $this->render('indexPicture');

    }

    public function one(){
        $pic = $this->loadModel('pictures');
        $this->set("pictures", $pic->getOne($_GET["idObraz"]));
        $this->render("onePicture");
    }

    public function oneShow(){
        $pic = $this->loadModel('pictures');
        $this->set("pictures", $pic->getOne($_GET["idObraz"]));
        $this->render("onePictureShow");
    }


    public function atrapa(){
        print("<h1>ATRAPA (pictures_view->atrapa)</h1>");

    }

}