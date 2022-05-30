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
    <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/ventas.css">
    <title>Panel de Administración | Lista de Ventas</title>
</head>
<body>

<?php require 'components/header.php' ?>

<div class="Nav">
    <span>Administra tus ventas online y presenciales, recuerda con PayPal se aplica 5.4% + USD 0.30 de comisión</span>
</div>

<div class="Ventas">
    <div class="Ventas_main">
        <a href="<?php echo constant('URL').'panel/venta';?>">REGISTAR VENTA PRESENCIAL</a>
        <span>GANANCIA TOTAL: S/<?php echo $data[1]->precio_total; ?></span>
    </div>
    <div class="Ventas_history">
        <div class="Ventas_table__head">
            <p>Telefono Contacto</p>
            <p>Descripción</p>
            <p>Precio Total</p>
            <p>Dirección Entrega</p>
            <p>Acción</p>
        </div>
        <div class="Ventas_table__body">

        <?php foreach ($data[0] as $index) { ?>

            <div>  
                <p><?php echo $index->telefono_contacto; ?></p>
                <p><?php echo $index->telefono_contacto; ?></p>
                <span>S/ <?php echo $index->precio_total; ?></span>
                <p><?php echo $index->direccion_entrega; ?></p>
                <a href="<?php echo constant('URL').'eliminar/venta?id='.$index->id_venta;?>">Eliminar</a>
            </div>

        <?php } ?>

        </div>
    </div>
</div>

<?php require 'components/footer.php' ?>

</body>
</html>