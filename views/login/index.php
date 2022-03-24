<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/global.css">
    <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/login.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ZenaZon | Inicio de Sesión</title>
</head>
<body>

<?php
    if(isset($_SESSION['errorLogin'])){
        echo "<div class='MsgError'><span>Credenciales Incorrectas</span></div>";
    }
?>

<div class="Root">
    <div class="Form">
        <div class="Form_wrap">
            <form action="<?php echo constant('URL')."inicio/sesion";?>" method="POST">
                <input name="email" required type="email" placeholder="Correo Electrónico">
                <input name="password" required type="password" placeholder="Contraseña">
                <input type="submit" value="Iniciar Sesión">
            </form>
            <h3>¿Nuevo(a) en ZenaZon? <a href="<?php echo constant('URL');?>registro">Registrate Gratis</a></h3>
        </div>
    </div>
</div>

    <?php require 'components/footer.php' ?>

</body>
</html>
