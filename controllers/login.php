<?php

class Login extends Controller{
    function __construct(){
        parent::__construct();
        session_start();

        if(isset($_SESSION['isLogged'])){
            header('Location: '.constant('URL').'panel/productos');
        }else{
            $this->view->render("login/index",null);
        }
    }
}

?>