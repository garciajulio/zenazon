<header class="Header">
    <img id="buttonOpen" src="<?php echo constant('URL');?>public/img/button.svg" width="25" alt="X" loading="lazy">
    <span><?php echo $_SESSION['email'];?></span>
</header>
<div class="MenuLeft" id="menuLeft">
    <div class="MenuLeft_wrapper">
        <span class="MenuLeft_button" id="buttonClose">X</span>
        <div class="MenuLeft_links">
            <a href="<?php echo constant('URL').'panel/productos';?>">Inicio</a>
            <a href="<?php echo constant('URL').'panel/agregar/';?>">Agregar</a>
            <a href="<?php echo constant('URL').'panel/ventas';?>">Ventas</a>
            <a href="<?php echo constant('URL').'panel/configuracion';?>">Configuración</a>
        </div>
        <div class="MenuLeft_help">
            <a href="?logout=true">Cerrar Sesión</a>
        </div>
        <?php if(isset($_GET['logout'])){
            session_destroy();
            header("Location: ".constant('URL').'login/');
        } ?>
    </div>
</div>