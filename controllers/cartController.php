<?php
require_once 'models/product.php';

class cartController{

	public  function index(){
		
        $cart = $_SESSION['cart'];

        require_once 'views/cart/index.php';

	}

	public function add(){
        if(isset($_GET['id'])){
            $product_id = $_GET['id'];
        }else{
            header('Location:'.base_url);
        }
		if(isset($_SESSION['cart'])){

            // Check if product alread exists in the cart
            $counter = 0;
            foreach($_SESSION['cart'] as $index => $element){
                if($element['product_id'] == $product_id){
                    // add more units of that product to the cart
                    $_SESSION['cart'][$index]['units']++;
                    $counter++;
                }
            }
            
        }
        // if the prduct does not exists in the cart 
        if(!isset($counter) || $counter == 0){
            // GET PRODUCT
            $product = new Product();
            $product->setId($product_id);
            $product = $product->getOne();// $product becomes a SQL result now

            if(is_object($product)){
                $_SESSION['cart'][] = array(
                    "product_id" => $product->id, // instead of $product->getId()
                    "price" => $product->price, // because it is a SQL result now
                    "units" => 1,
                    "product" => $product
                );
            }
        }
        
        header("Location:".base_url."cart/index");
	}
    public function remove(){
		
	}
    public function deleteAll(){
		unset($_SESSION['cart']);
	}
}