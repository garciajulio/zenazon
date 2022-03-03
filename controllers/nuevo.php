<?php

class Nuevo extends Controller{

    function __construct(){
        parent::__construct();
        echo "<p>Nuevo controlador Main</p>";
    }

    function registrarUsuario(){
        
        // Filtrar para el url tienda;
        
        $tienda = $_POST['tienda'];
        $info = $_POST['info'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if($this->model->insert(['tienda' => $tienda, 'info' => $info, 'telefono' => $telefono, 'email' => $email, 'password' => $password])){
            echo "Funciona";
        }else{
            echo "Error";
        }
        
        
    }
}

?>