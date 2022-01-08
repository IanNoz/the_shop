<?php

class utils{
    public static function deleteSession($name){
        if(isset($_SESSION[$name])){
            $_SESSION[$name] = NULL;
            unset($_SESSION[$name]);
        }
        return $name;
    }

    public static function isAdmin(){
        if(!isset($_SESSION['admin'])){
            header("Location:".base_url);
        }else{
            return true;
        }
    }

    public static function showCategories(){
        require_once 'models/category.php';
        $category = new Category();
        $categories = $category->getAll();

        return $categories;
    }

    public static function cartStats(){
        
        $stats = array( 'count' => 0,
                        'total' => 0 );

        if(isset($_SESSION['cart'])){
            $stats['count'] = count($_SESSION['cart']);

            foreach($_SESSION['cart'] as $index => $product){
                $stats['total'] += $product['price']*$product['units'];
            }

        }
        return $stats;
    }
}