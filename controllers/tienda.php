<?php

class Tienda extends Controller{
    
    function __construct(){
        parent::__construct();
        $this->view->render("shop/index");
    }

    function producto(){
        echo "hola";
    }
}


?>