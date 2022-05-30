<?php

class Tienda extends Controller{

    public $url = '';

    function __construct($t){
        parent::__construct();
        $this->url = $t;
    }

    public function home(){
        $shop = $this->model->getTienda(['url' => $this->url]);
        
        if($shop == False) $this->view->render("error/index",null);

        else{
            $key = $shop->id_privado;
            $productos = $this->model->getProductos(['unique'=> $key]);
            $data = array($shop,$productos);
            $this->view->render("tienda/index",$data);
        }
    }
    
    public function p(){
        $shop = $this->model->getTienda(['url' => $this->url]);

        if($shop == False){
            $this->view->render("error/index",null);
            return;
        }

        $id = explode("/",$_GET['url'])[3];
        $product = $this->model->getProduct(['id'=> $id]);

        if($product == False){
            $this->view->render("error/index",null);
            return;
        }

        $PAYPAL_CLIENT = "Ad-MIanBE1gD7w4MzIwnqtQ-RSHR-x-EKYjWDFcfF2RJvnaF2TFHLBEz_CfOD13asCz_D_brp7bajn9t";
        $PAYPAL_SECRET = "EIt9_o-I7cCeHPGuhxWsI1HSp5tcgromXstruMxz1POlRxdjnRVdNUiRrnAJPBEwaxx4ITJ811GC4uof";

        $data = array($shop,$product);
        $this->view->render("tienda/producto",$data);
    }

    public function cart(){
        $shop = $this->model->getTienda(['url'=> $this->url]);

        if($shop == False) $this->view->render("error/index",null);
        else{
            $data = array($shop);
            $this->view->render("tienda/cart",$data);
        }
    }
}

?>