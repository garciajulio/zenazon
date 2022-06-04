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
        $unique = $_SESSION['unique'];
        $data = $this->model->getProducts($unique);
        $this->view->render('panel/index',$data);
    }

    function agregar(){
        $this->view->render('panel/agregar',null);
    }

    function ventas(){
        $unique = $_SESSION['unique'];
        $ventas = $this->model->getVentas($unique);
        $gananciaTotal = $this->model->getSumTotal($unique);
        $data = array($ventas,$gananciaTotal);
        $this->view->render('panel/ventas',$data);
    }

    function venta(){
        $this->view->render('panel/nuevaventa',null);
    }

    function configuracion(){
        $unique = $_SESSION['unique'];
        $data = $this->model->getData($unique);
        $this->view->render('panel/configuracion',$data);
    }

    function marketing(){
        $unique = $_SESSION['unique'];
        $data = $this->model->getCupones($unique);
        $this->view->render('panel/marketing',$data);
    }

    function editar(){
        if(isset($_GET['id'])){

            $id = $_GET['id'];
            $unique = $_SESSION['unique'];
            $data = $this->model->editId($id,$unique);
            $this->view->render('panel/editar',$data);
        
        }else{
            header("Location: ".constant('URL').'panel/agregar');
        }
    }
}

?>