<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $data[1]->nombre ?> - Productos</title>
    <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/global.css">
    <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/shop/main.css">
    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo $data[0]->key_paypal;?>&currency=USD"></script>
</head>
<body>

<?php require 'components/shop/header.php'; ?>

<?php $precio = number_format($data[1]->precio,2); ?>

<form action="<?php echo constant('URL').'t/'.$data[0]->url_tienda.'/gracias';?>" id="form" method="POST">
    <input type="hidden" name="tienda" value="<?php echo $data[0]->nombre_tienda;?>">
    <input type="hidden" name="nombre" value="<?php echo $data[1]->nombre;?>">
    <input type="hidden" name="precio" value="<?php echo $precio; ?>">
    <input type="hidden" name="stock" value="1">
    <input type="hidden" name="id">
</form>

<div class="CardMain">
    <h1><?php echo $data[1]->nombre; ?> </h1>
    <div class="CardMain_info">
        <p><?php echo $data[1]->informacion; ?></p>
        <img width="350" src="<?php echo 'https://storage.googleapis.com/zenazon.appspot.com/productos/'.$data[1]->url_imagen; ?>" alt="">
        <span>$/ <?php echo $precio; ?></span>
    </div>
    <div id="paypal-button-container"></div>
</div>

<div class="CardRecomend">
    <h3>Recomendado para tí <3</h3>
    <div>
        <?php foreach($data[2] as $index){?>
        <div>
            <img height="180" width="100%" src="<?php echo 'https://storage.googleapis.com/zenazon.appspot.com/productos/'.$index->url_imagen; ?>" alt="">
            <a href="<?php echo constant('URL').'t/'.$data[0]->url_tienda.'/p/'.$index->id_producto;?>">Ver más</a>
        </div>
        <?php } ?>
    </div>
</div>

<script>

    const formulario = document.getElementById('form');

    paypal.Buttons({

        style: {
            shape:  'pill',
            label:  'pay'
        },

        createOrder: (data, actions) => {
          return actions.order.create({
            "purchase_units": [{
                "amount": {
                    value: <?php echo $precio; ?>
                 }
            }]
          });
        },

        onApprove: (data, actions) => {
            
            return actions.order.capture()
            .then(function(orderData) {
            
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];

            console.log(`Transaction ${transaction.status}: ${transaction.id} See console for all available details`);
            
            formulario.submit();
            
            })
        },

        onCancel: function (data) {
            alert("Compra cancelada");
        },

        onError: function (err) {
            alert("Error en la compra");
        }

    }).render('#paypal-button-container');

</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="<?php echo constant('URL');?>public/js/carrito.js"></script>
</body>
</html>