<?php

class Panel extends Controller{

    function __construct(){
        parent::__construct();
        session_start();

        if(!isset($_SESSION['isLogged'])){
            header('Location: '.constant('URL').'login/');
        }
    }

    function productos(){
        $email = $_SESSION['email'];
        $data = $this->model->getProducts($email);
        $this->view->render('panel/index',$data);
    }

    function agregar(){
        $this->view->render('panel/agregar',null);
    }

    function ventas(){
        $this->view->render('panel/ventas',null);
    }

    function configuracion(){
        $this->view->render('panel/configuracion',null);
    }

    function editar(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $email = $_SESSION['email'];
            $data = $this->model->editId($id,$email);
            $this->view->render('panel/editar',$data);
        }else{
            header("Location: ".constant('URL').'panel/agregar');
        }
    }
}

?>