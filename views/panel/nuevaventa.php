<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="<?php echo constant('URL');?>public/js/index.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <script type="module" src="<?php echo constant('URL');?>public/js/firebase.js"></script>
    <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/global.css">
    <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/nuevaventa.css">
    <title>Panel de Administración | Nueva Venta</title>
</head>
<body>

<?php require 'components/header.php' ?>

<div class="Secction_nav">
    <span>Registra una nueva venta presencial</span>
</div>

<div class="Agregar">
    <form action="<?php echo constant('URL').'registrar/venta';?>" method="POST">

    <input autoComplete="off" maxlength="15" name="telef" placeholder="Telefono de Contacto" type="text" required>
    <input maxlength="1000" autoComplete="off" name="descripcion" placeholder="Descripcion de la venta" type="text" required>
    <input autoComplete="off" step="0.01" min="0.50" max="5000.00" name="precio" placeholder="Precio: S/" type="number" required>
    <input maxlength="255" autoComplete="off" name="direccion" placeholder="Direccion de entrega" type="text" required>
    <input class="Agregar_btn" type="submit" value="REGISTRAR VENTA">

    </form>
</div>

<?php require 'components/footer.php'; ?>

</body>
</html>