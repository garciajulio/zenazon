<header class="Header_shop">
    <a href="<?php echo constant('URL').'t/'.$data[0]->url_tienda; ?>">
        <?php echo $data[0]->nombre_tienda; ?>
    </a>

    <a href="<?php echo constant('URL').'t/'.$data[0]->url_tienda.'/cart'; ?>">
        <span id="number_cart">0</span>
        <img width="25" src="<?php echo constant('URL').'public/img/cart.svg';?>" alt="">
    </a>
</header>