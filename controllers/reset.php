<?php

class Reset extends Controller{
    
    function __construct(){
        parent::__construct();
        //!$this->view->render("error/index",null);
    }

    function password(){
        $this->view->render("tools/reset",null);
    }

}

?>