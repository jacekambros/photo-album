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
    public function indexShow(){
        $pic = $this->loadModel('pictures');
        $this->set('pictures', $pic->getAll());
        $this->render('indexPictureShow');
    }

    public function indexEdit(){
        $pic = $this->loadModel('pictures');
        $this->set('pictures', $pic->getAll());
        $this->render('indexPictureEdit');
    }

    public function oneEdit(){
        $pic = $this->loadModel('pictures');
        $this->set("pictures", $pic->getOne($_GET["idObraz"]));
        $this->render("onePictureEdit");
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