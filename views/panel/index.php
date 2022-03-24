<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="<?php echo constant('URL'); ?>public/js/index.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/global.css">
    <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/products.css">
    <title>Panel de Administración | Inventario de Productos</title>
</head>
<body>

<?php require 'components/header.php' ?>

<div class="Nav">
    <span>Mis productos</span>
    <div class="Nav_search">
        <input placeholder="Buscar producto" type="text">
    </div>
</div>

<?php if(empty($data)){ ?>
    <div class="Empty">
        <img src="<?php echo constant('URL').'/public/img/vacio.png'?>" alt="Vació">
        <span>Completa la primera tarea: <b>agrega productos a la tienda</b></span>
    </div>
<?php } ?>

<div class="Main">

    <?php foreach ($data as $index) { ?>
    
    <div class="Main_card">
        <img draggable="false" height="212.25" src="https://storage.googleapis.com/zenazon.appspot.com/productos/<?php echo $index->url_imagen;?>" onerror="
        if (this.src != '<?php echo constant('URL').'public/img/picture.png'?>') this.src = '<?php echo constant('URL').'public/img/picture.png'?>'" width="100%" alt="X">
        <div class="Main_actions">
            <a href="<?php echo constant('URL').'panel/editar/producto?id='.$index->id_producto;?>">
                <img width="20" src="<?php echo constant('URL');?>/public/img/edit.svg" alt="Editar">
            </a>

            <a href="<?php echo constant('URL').'eliminar/producto?id='.$index->id_producto;?>">
                <img width="20" src="<?php echo constant('URL');?>/public/img/eliminar.svg" alt="Eliminar">
            </a>
        </div>
    </div>

    <?php } ?>

</div>

<?php require 'components/footer.php' ?>

</body>
</html>