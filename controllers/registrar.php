<?php

class Registrar extends Controller{

    function __construct(){
        parent::__construct();
        session_start();
        //$this->view->render('panel/venta',null);
    }
    
    function venta(){

        if(isset($_POST['telef']) && isset($_POST['descripcion']) && isset($_POST['precio']) && isset($_POST['direccion'])){

            $telef = $_POST['telef'];
            $descripcion = $_POST['descripcion'];
            $direccion = $_POST['direccion'];
            $precio = $_POST['precio'];
            $unique = $_SESSION['unique'];

            if($this->model->insert(['unique' => $unique,'telef' => $telef, 'descripcion' => $descripcion, 'direccion' => $direccion, 'precio' => $precio])){
                header('location: '.constant('URL').'panel/ventas');
            }else{ echo "<script>alert('Error al registrar venta');</script>"; }

        }else{
            header('Location: '.constant('URL').'panel/venta');
        }
    }
}

?>