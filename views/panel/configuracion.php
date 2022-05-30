<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="<?php echo constant('URL');?>public/js/index.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/global.css">
    <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/config.css">
    <title>Panel de Administración | Configuración de mi Catálogo Virtual</title>
</head>
<body>

<?php require 'components/header.php' ?>

<div class="Nav">
    <span>Agregar productos a tu catálogo online para continuar vendiendo</span>
</div>

<div class="Config">
    <a target="_blank" class="Config_url" href="<?php echo constant('URL').'t/'.$data[0]->url_tienda ?>">
        <img width="25" src="<?php echo constant('URL');?>public/img/link.png" alt="->">
        Visitar mi catálogo online
    </a>
    <form action="<?php echo constant('URL')."configuracion/catalogo"; ?>" method="POST" class="Config_form">
        <input value="<?php echo $data[0]->nombre_tienda; ?>" placeholder="Nombre de tu tienda" type="text" name="tienda" autocomplete="off" required>
        <input value="<?php echo $data[0]->url_tienda; ?>" pattern="^[a-z]+$" placeholder="Link de tu tienda" type="text" name="url" autocomplete="off" required>
        <input value="<?php echo $data[0]->telefono_tienda; ?>" placeholder="WhatsApp de tu tienda" type="text" name="telefono" autocomplete="off" required>
        <input value="<?php echo $data[0]->info_tienda; ?>" placeholder="Descripción de tu catálogo" type="text" name="info" autocomplete="off" required>
        <input autocomplete="off" name="paypal_key" value="<?php echo $data[0]->key_paypal; ?>" placeholder="Clave secreta de PayPal (Opcional)" type="text">
        <input type="submit" value="ACTUALIZAR DATOS">
    </form>
</div>

<?php require 'components/footer.php' ?>

</body>
</html>