<?php

    class View{
        function __construct(){
        }

        function render($name,$data){
            require 'views/'.$name.'.php';
        }
    }

?>