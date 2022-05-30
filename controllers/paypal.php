<?php

class Paypal extends Controller{
    function __construct(){
        parent::__construct();
          //$this->view->render("error/index",null);
    }

    function create(){
        echo "orden creada";
    }

}

?>