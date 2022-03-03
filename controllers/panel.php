<?php

class Panel extends Controller{

    function __construct(){
        parent::__construct();
        if(true){
            echo "Session";
        }else{
            echo "403";
        }
    }

    function agregar(){
        $this->view->render('panel/agregar');
    }

    function productos(){
        $this->view->render('panel/productos');
    }

    function ventas(){
        $this->view->render('panel/ventas');
    }

    function configuracion(){
        $this->view->render('panel/configuracion');
    }
}

?>