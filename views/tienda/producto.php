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

<div class="CardMain">
    
    <img width="250" src="<?php echo 'https://storage.googleapis.com/zenazon.appspot.com/productos/'.$data[1]->url_imagen; ?>" alt="">
    <h1><?php echo $data[1]->nombre; ?> </h1>
    <p><?php echo $data[1]->informacion; ?></p>
    <span>$/ <?php echo $precio; ?></span>
    <div id="paypal-button-container"></div>

</div>

<script>

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
            
            /*return actions.order.capture()
            .then(function(orderData) {
            
            // Successful capture! For dev/demo purposes:
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

            const transaction = orderData.purchase_units[0].payments.captures[0];

            alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
            


            })
            .catch(err){
                alert("Error de compra");
            }

            -*/
        },

        onCancel: function (data) {
            alert("Compra cancelada");
        },

        onError: function (err) {
            alert("Error en la compra");
        }

    }).render('#paypal-button-container');

</script>
</body>
</html>