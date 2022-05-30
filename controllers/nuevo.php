<?php

class Nuevo extends Controller{

    function __construct(){
        parent::__construct();
        session_start();
        $this->view->render('registro/index',null);
    }
    
    function registro(){

        $tienda = $_POST['tienda'];
        $info = $_POST['info'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
        $url = $_POST['url'];
        $password = $_POST['password'];
        $unique = uniqid($url);

        if(isset($tienda) && isset($info) && isset($telefono) && isset($email) && isset($password) && isset($url)){

            if($this->model->insert(['tienda' => $tienda, 'info' => $info, 'telefono' => $telefono, 'email' => $email, 'password' => $password, 'url' => $url, 'unique' => $unique])){
                
                $_SESSION['unique'] = $unique;
                $_SESSION['email'] = $email;
                $_SESSION['isLogged'] = true;
                header('location: '.constant('URL').'panel/productos');

            }else{
                $_SESSION['errorRegister'] = true;
            }

        }else{
            header('location: '.constant('URL').'registro/');
        }
    }
}

?>