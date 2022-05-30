<?php

class Recuperar extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->render('tools/reset',null);
    }
    
    function password(){

        if(isset($_POST['email'])){

            $email = $_POST['email'];
            $exist = $this->model->insert(['email' => $email]);

            if($exist){

                $to=$exist->email;
                $asunto="RECUPERACION DE CONTRASEÑA | SENAZON";
                $message="Hola! Te enviamos este mensaje ya que solicitaste hace unos minutos en nuestro sistema de Senazon poder ver tu contraseña.\nTu correo es: ".$to." Tu contraseña es: ".$exist->password;
                $from = "soportecliente@senazon.com";
                $headers = ":".$from;
                $email = mail($to,$asunto,$message,$headers,$from);

                if ($email) echo "<script>alert('Correo Enviado, revisa tu bandeja');</script>";
                else echo "<script>alert('Error al enviar el correo');</script>";

            }else{
                echo "<script>alert('El correo ingresado no está registrado');</script>";
            }

        }else{ header('location: '.constant('URL').'login/'); }
    }
}

?>