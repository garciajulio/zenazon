<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/global.css">
    <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/register.css">
    <title>ZenaZon | Registra tu negocio online</title>
</head>
<body>

<?php
    if(isset($_SESSION['errorRegister'])){
        echo "<div class='MsgError'><span>Error durante el registro</span></div>";
    }
?>
    
<div class="Root">
    <div class="Title">
        <h2>Registro Gratuito</h2>
    </div>
    <div class="Form">
    <form action="<?php echo constant('URL')."nuevo/registro"; ?>" method="POST">
        <input placeholder="Nombre de tu tienda" type="text" name="tienda" autocomplete="off" required>
        <input pattern="^[a-z]+$" placeholder="Link de tu tienda" type="text" name="url" autocomplete="off" required>
        <input placeholder="WhatsApp de tu tienda" type="text" name="telefono" autocomplete="off" required>
        <input placeholder="Descripción de tu catálogo" type="text" name="info" autocomplete="off" required>
        <input placeholder="Correo Electrónico" type="email" name="email" autocomplete="off" required>
        <input placeholder="Contraseña" type="password" name="password" required>
        <div class="Form-terminos">
            <input type="checkbox" required>
            <span>Acepto los terminos legales para mi registro en ZenaZon</span>
        </div>
        <input type="submit" value="Registar">
    </form>
    </div>
</div>

    <?php require 'components/footer.php' ?>

</body>
</html>
