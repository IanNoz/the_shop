<?php
require_once 'models/order.php';
class orderController{

	public  function index(){
		require_once 'views/order/make.php';

	}
	public function make(){
		if(isset($_SESSION['identity'])){
			$user_id = $_SESSION['identity']->id;
			$country = isset($_POST['country']) ? $_POST['country'] : false;
			$postcode = isset($_POST['postcode']) ? $_POST['postcode'] : false;
			$address = isset($_POST['address']) ? $_POST['address'] : false;
		
			$stats = Utils::cartStats();
			$cost = $stats['total'];
			if($country && $postcode && $address){
				// SAVE ORDER IN DB
				$order = new Order();

				$order->setUser_id($user_id);
				$order->setCountry($country);
				$order->setPostcode($postcode);
				$order->setAddress($address);
				$order->setCost($cost);
				
				$save = $order->save();

				// SAVE ORDER ROW
				$save_row = $order->save_row();

				if($save && $save_row){
					$_SESSION['order'] = 'completed';
				}else{
					$_SESSION['order'] = 'failed';
				}
			}

		}else{
			header("Location:".base_url);
		}
	}
}