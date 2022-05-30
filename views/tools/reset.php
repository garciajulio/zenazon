<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/global.css">
    <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/login.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ZenaZon | Recupera tu contraseña</title>
</head>
<body>

<div class="Root">
    <div class="Form">
        <div class="Form_wrap">
            <form action="<?php echo constant('URL')."recuperar/password";?>" method="POST">
                <h1 style="text-align:center;">RECUPERAR CONTRASEÑA</h1>
                <input name="email" required type="email" placeholder="Correo Electrónico">
                <input type="submit" value="Enviar correo de recuperación">
            </form>
        </div>
    </div>
</div>

    <?php require 'components/footer.php' ?>

</body>
</html>