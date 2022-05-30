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
    <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/marketing.css">
    <title>Panel de Administración | Marketing</title>
</head>
<body>

<?php require 'components/header.php' ?>

<div class="Nav">
    <span>Premia las compras de tus clientes más fieles con cupones de descuento para tus productos </span>
</div>

<div class="Marketing">
    <div class="Marketing_body">
        <form action="<?php echo constant('URL').'cupones/nuevo';?>" method="POST">
            <input autocomplete="off" name="name" type="text" maxlength="7" placeholder="Nombre del cupón" required>
            <input max="99" min="1" name="percent" type="number" placeholder="% de descuento:" required>
            <button type="submit">CREAR CUPON</button>
        </form>
    </div>
    <div class="Marketing_history">
    
        <?php foreach ($data as $index) { ?>

        <div>
            <span><?php echo $index->nombre_cupon; ?></span>
            <span><?php echo $index->porcentaje."% de descuento para todos mis productos"; ?></span>
            <a href="">Eliminar</a>
        </div>

        <?php } ?>

    </div>
</div>

<?php require 'components/footer.php' ?>

</body>
</html>