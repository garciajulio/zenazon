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
    <script type="module" src="<?php echo constant('URL');?>public/js/firebase.js"></script>
    <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/global.css">
    <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/agregar.css">
    <title>Panel de Administración | Editar Producto</title>
</head>
<body>

<?php require 'components/header.php' ?>

<div class="Nav">
    <span>Editando producto</span>
</div>

<div class="Agregar">
    <form action="<?php echo constant('URL').'editar/producto';?>" method="POST">
    <div class="Agregar_left">
        <img id="image" draggable="false" height="332.38" src="https://storage.googleapis.com/zenazon.appspot.com/productos/<?php echo $data[0]->url_imagen;?>" onerror="
        if (this.src != '<?php echo constant('URL').'public/img/picture.png'?>') this.src = '<?php echo constant('URL').'public/img/picture.png'?>'" width="100%" alt="X">
        <input class="fileEdit" id="file" type="file">
    </div>

    <div class="Agregar_right">
        <input type="hidden" name="id" value="<?php echo $data[0]->id_producto;?>">
        <input value="<?php echo $data[0]->nombre; ?>" autoComplete="off" name="nombre" placeholder="Nombre del producto" type="text" required>
        <input value="<?php echo $data[0]->precio; ?>" autoComplete="off" step="0.01" min="0.50" max="5000.00" name="precio" placeholder="Precio: S/" type="number" required>
        <input value="<?php echo $data[0]->informacion; ?>" autoComplete="off" name="info" placeholder="Información del producto" type="text" required>
        <input value="<?php echo $data[0]->stock; ?>" autoComplete="off" min="1" max="5000" step="1" name="stock" placeholder="Stock del producto" type="number" required>
        <input value="<?php echo $data[0]->url_imagen?>" type="hidden" name="imagen" id="nameFile">
    </div>
    
    <input class="Agregar_btn" type="submit" value="ACTUALIZAR PRODUCTO">

    </form>
</div>

<?php require 'components/footer.php'; ?>

</body>
</html>