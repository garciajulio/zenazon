<?php

class Configuracion extends Controller{

    function __construct(){
        parent::__construct();
        session_start();
    }
    
    function catalogo(){

        if(isset($_POST['tienda']) && isset($_POST['url']) && isset($_POST['telefono']) && isset($_POST['info'])){

            $tienda = $_POST['tienda'];
            $url = $_POST['url'];
            $telefono = $_POST['telefono'];
            $info = $_POST['info'];
            $unique = $_SESSION['unique'];
            $paypal = empty($_POST['paypal_key']) ? null : $_POST['paypal_key'];

            if($this->model->updateStore(['tienda' => $tienda,'url'=>$url,'telefono'=>$telefono,'unique'=>$unique,'info' => $info, 'paypal' => $paypal])){
                header('location: '.constant('URL').'panel/configuracion');
            }else{
                echo "<script>alert('Error al cambiar la configuracion');</script>";
            }

        }else{
            header('Location: '.constant('URL').'panel/productos'); 
        }
    }
}

?>