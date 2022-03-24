<?php

class Editar extends Controller{

    function __construct(){
        parent::__construct();
        session_start();
        //        $this->view->render('panel/agregar',null);
    }
    
    function producto(){

        if(isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['imagen']) && isset($_POST['stock']) && isset($_POST['info']) && isset($_POST['precio']) && isset($_POST['owner'])){

            $id = $_POST['id'];
            $imagen = $_POST['imagen'];
            $nombre = $_POST['nombre'];
            $stock = $_POST['stock'];
            $info = $_POST['info'];
            $precio = $_POST['precio'];
            $email = $_SESSION['email'];

            if($this->model->editId(['id' => $id,'imagen'=>$imagen,'nombre'=>$nombre,'stock'=>$stock,'info'=>$info,'precio'=>$precio,'owner' => $email])){
                header('location: '.constant('URL').'panel/productos');
            }else{
                echo "<script>alert('Error al editar');</script>";
            }

        }else{
            header('Location: '.constant('URL').'panel/agregar'); 
        }
    }
}

?>