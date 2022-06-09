<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $data[0]->nombre_tienda; ?> - Catálogo Virtual - Carrito de Compras</title>
    <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/global.css">
    <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/shop/main.css">
    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo 'Ad-MIanBE1gD7w4MzIwnqtQ-RSHR-x-EKYjWDFcfF2RJvnaF2TFHLBEz_CfOD13asCz_D_brp7bajn9t';?>&currency=USD"></script>
</head>
<body>

<?php require 'components/shop/header.php'; ?>

<div class="Cart">
    <div class="Cart_list" id="Cart_list">
        <h3>Detalles de mi pedido</h3>
        <div id="totalPrice"></div>
    </div>
    <div class="Cart_cupon">
        <h3>Cupón de Descuento</h3>
        <div>
            <input name="cupon" autocomplete="off" id="nombreCupon" maxlength="7" type="text" placeholder="Nombre del cupón (Opcional)">
            <button id="btnCanjear">Canejar Cupón</button>
        </div>
    </div>
    <div class="Cart_form">
        <form id="form" action="<?php echo constant('URL').'t/'.$data[0]->url_tienda.'/gracias';?>" method="POST">

            <input type="hidden" name="tienda" value="<?php echo $data[0]->nombre_tienda; ?>">
            <input id="inputNombres" type="hidden" name="nombre" value="">
            <input type="hidden" id="inputPrecio" name="precio" value="">
            <input id="inputStock" type="hidden" name="stock" value="">

            <h3>Pagar Online</h3>
            <div>
                <div id="paypal-button-container"></div>
            </div>
        </form>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="<?php echo constant('URL');?>public/js/carrito.js"></script>
<script>
const btnCanjear = document.getElementById('btnCanjear');
const inputCupon = document.getElementById('nombreCupon');

btnCanjear.addEventListener('click', () => {

    valueCupon = inputCupon.value;
    
    if(!valueCupon){
        alert("Inserta el nombre del cupón");
        return;
    }

    const URLactual = window.location.pathname;
    window.location.href = URLactual+"?cupon="+valueCupon;

});

</script>

<?php

if(isset($_GET['cupon'])){

    $fileController = 'controllers/canjear.php';
    require_once $fileController;
    $controller = new Canjear();
    $controller->loadModel('canjear');
    $percent = $controller->cupon($controller);
    echo "<script> canejarCupon(".$percent."); </script>";
}

?>

<script>

$(document).ready(function(){
    
    const values = window.location.search;
    const urlParams = new URLSearchParams(values);
    const cupon = urlParams.get('cupon');
    if(!cupon) mapCart();
    const totalPrice = document.querySelector('#totalPrice  span').textContent.split("/")[1];
    const form = document.getElementById('form');

    paypal.Buttons({
        
        style: {
            shape:  'pill',
            label:  'pay'
        },

        createOrder: function(data, actions){
            return actions.order.create({
                "purchase_units": [{
                    "amount": {
                    "value": totalPrice
                }
            }]
        });
    
        },

        onApprove: function(data, actions){
    
        return actions.order.capture()
        .then(function(orderData) {
            
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

            const transaction = orderData.purchase_units[0].payments.captures[0];

            form.submit();
            
        })

        },

        onCancel: function (data) {
            alert("Compra cancelada");
        },

        onError: function (err) {
            alert("Error en la compra");
        }

    }).render('#paypal-button-container');
    
});
    
</script>
</body>
</html>