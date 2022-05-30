<?php

class Cupones extends Controller{

    function __construct(){
        parent::__construct();
        session_start();
    }

    function nuevo(){
        if(isset($_POST['name']) && isset($_POST['percent'])){

            $name = $_POST['name'];
            $percent = $_POST['percent'];
            $unique = $_SESSION['unique'];

            if($this->model->insert(['name' => $name, 'percent' => $percent,'unique' => $unique])){

                header('location: '.constant('URL').'panel/marketing');

            }else{ echo "<script>alert('Error en el cupón');</script>"; }

        }else{
            header('Location: '.constant('URL').'panel/marketing'); 
        }
    }
}

?>