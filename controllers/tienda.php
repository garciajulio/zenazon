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

    public function gracias(){
        if(isset($_POST['nombre']) && isset($_POST['precio']) && isset($_POST['stock'])){
        
        $tienda = $_POST['tienda'];
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];

        $table = array([$stock,$nombre,$precio]);
        $info = $info = array('precio'=>$precio,'id'=>'aw0vb9x4d77fuo','tienda'=>$tienda);
        $data = array($table,$info);
        $this->view->render("tienda/gracias",$data);

        }else echo "Error 403 - No autorizado";
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

        $recomend = $this->model->getSimilarProducts(['unique' => $shop->id_privado,'id' => $id]);
        $data = array($shop,$product,$recomend);
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