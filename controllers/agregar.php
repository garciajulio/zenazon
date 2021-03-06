<?php

class Agregar extends Controller{

    function __construct(){
        parent::__construct();
        session_start();
        $this->view->render('panel/agregar',null);
    }
    
    function producto(){

        if(isset($_POST['nombre']) && isset($_POST['imagen']) && isset($_POST['stock']) && isset($_POST['info']) && isset($_POST['precio'])){

            $nombre = $_POST['nombre'];
            $imagen = $_POST['imagen'];
            $stock = $_POST['stock'];
            $precio = $_POST['precio'];
            $info = $_POST['info'];
            $unique = $_SESSION['unique'];

            if($this->model->insert(['nombre' => $nombre, 'imagen' => $imagen, 'stock' => $stock, 'precio' => $precio, 'info' => $info, 'unique' => $unique])){
                header('location: '.constant('URL').'panel/productos');
            }else{ echo "<script>alert('Error al agregar');</script>"; }

        }else{
            header('Location: '.constant('URL').'panel/agregar'); 
        }
    }
}

?>