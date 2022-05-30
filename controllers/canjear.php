<?php

class Canjear extends Controller{

    function __construct(){
        parent::__construct();
    }
    
    function cupon(){
        $cupon = $_GET['cupon'];
        return $this->model->insert(['name' => $cupon]);
    }
}