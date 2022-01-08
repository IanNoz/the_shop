<?php
session_start();
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';
require_once 'views/layout/header.php';
require_once 'views/layout/aside.php';


function showError(){

	$error = new errorController();
    $error->index();
}

if(isset($_GET['controller'])){

	$controller_name = $_GET['controller'].'Controller';

}else{

	$controller_name = controller_default.'Controller';
}

if(class_exists($controller_name)){	
	
	$controller = new $controller_name();
	
	if(isset($_GET['action']) && method_exists($controller, $_GET['action'])){
	
		$action = $_GET['action'];
		$controller->$action();
	
	}elseif(!isset($_GET['action']) ){

		$action_name = action_default;
		$controller->$action_name();
	
	}else{
	
		showError();
	
	}

}else{

	showError();
}
require_once 'views/layout/footer.php';
