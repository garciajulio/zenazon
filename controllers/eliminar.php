<?php

class Eliminar extends Controller{

    function __construct(){
        parent::__construct();
        session_start();
    }
    
    function producto(){

        if(isset($_GET['id'])){

            $id_producto = $_GET['id'];
            $email = $_SESSION['email'];

            if($this->model->deleteId(['id' => $id_producto,'email' => $email])){
                header('location: '.constant('URL').'panel/productos');
            }else{
                echo "<script>alert('Error al eliminar');</script>";
            }

        }else{
            header('Location: '.constant('URL').'panel/productos'); 
        }
    }
}

?>