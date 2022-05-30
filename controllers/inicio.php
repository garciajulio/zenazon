<?php

class Inicio extends Controller{

    function __construct(){
        parent::__construct();
        session_start();
        $this->view->render('login/index',null);
    }
    
    function sesion(){

        if(isset($_POST['email']) && isset($_POST['password'])){

            $email = $_POST['email'];
            $password = $_POST['password'];

            $key = $this->model->insert(['email' => $email, 'password' => $password]);

            if(gettype($key) == 'string'){

                $_SESSION['email'] = $email;
                $_SESSION['isLogged'] = true;
                $_SESSION['unique'] = $key;
                header('location: '.constant('URL').'panel/productos');

            }else{
                $_SESSION['errorLogin'] = true;
            }

        }else{ header('location: '.constant('URL').'login/'); }
    }
}

?>