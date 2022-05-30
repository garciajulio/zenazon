<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $data[0]->nombre_tienda; ?> - Catálogo Virtual</title>
    <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/global.css">
    <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/shop/main.css">
</head>
<body>

<?php require 'components/shop/header.php'; ?>

<div class="Cards">
    <?php foreach($data[1] as $index){?>

    <div class="Card">
        <div class="Card_image">
        <a href="<?php echo constant('URL')."t/".$data[0]->url_tienda.'/p/'.$index->id_producto; ?>">
            <img src="<?php echo "https://storage.googleapis.com/zenazon.appspot.com/productos/".$index->url_imagen;?>" alt="<?php echo $index->url_imagen;?>">
        </a>
        </div>
        <div class="Card_info">
            <a href="<?php echo constant('URL').'t/'.$data[0]->url_tienda.'/p/'.$index->id_producto; ?>"><?php echo $index->nombre; ?></a>
            <span>S/<?php echo number_format($index->precio,2); ?></span>
            <div>
                <input id="<?php echo "stock-".$index->id_producto; ?>" min="1" max="<?php echo $index->stock; ?>" name="stock" type="number" value="1">
                </span>
                <button onclick="addCart('<?php echo $index->nombre; ?>',<?php echo $index->id_producto; ?>,'<?php echo 'stock-'.$index->id_producto; ?>',<?php echo number_format($index->precio,2);?>)">Añadir al carrito</button>
            </div>
        </div>
    </div>

    <?php } ?>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="<?php echo constant('URL');?>public/js/carrito.js"></script>
</body>
</html>