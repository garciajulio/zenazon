<?php

class Eliminar extends Controller{

    function __construct(){
        parent::__construct();
        session_start();
    }

    function venta(){
        if(isset($_GET['id'])){

            $id_producto = $_GET['id'];
            $unique = $_SESSION['unique'];

            if($this->model->deleteVentaId(['id' => $id_producto,'unique' => $unique])){
                header('location: '.constant('URL').'panel/ventas');
            }else{
                echo "<script>alert('Error al eliminar');</script>";
            }

        }else{
            header('Location: '.constant('URL').'panel/ventas'); 
        }
    }
    
    function producto(){

        if(isset($_GET['id'])){

            $id_producto = $_GET['id'];
            $unique = $_SESSION['unique'];

            if($this->model->deleteId(['id' => $id_producto,'unique' => $unique])){
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