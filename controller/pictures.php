<?php

/**
 * Created by PhpStorm.
 * User: cgpe
 * Date: 2017-07-25
 * Time: 11:08
 */

include_once 'controller/controller.php';

class pictures_controller extends controller
{
    /**
     * Zasilenie bazy zdjęciami
     */
    public function init_db()
    {
        // Okazjonalne zasilenie bazy nazwami plików zdjęć
        $model = $this->loadModel('pictures',$path='model/');
        $model->insert_pictures();
    }

    public function index(){
        $view = $this->loadView('pictures',$path='view/');
        $view->index();

    }

    public function edycja(){
        $view = $this->loadView('pictures',$path='view/');
        $view->one();
    }

    public function show(){
        $view = $this->loadView('pictures',$path='view/');
        $view->oneShow();

    }

    public function save(){
        $model = $this->loadModel('pictures',$path="model/");
        $model->save($_POST);
        $this->redirect('index.php?task=pictures&action=edycja&idObraz='.$_GET['idObraz']);
    }




}