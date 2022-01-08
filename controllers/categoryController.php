<?php
require_once 'models/category.php';
require_once 'models/product.php';

class categoryController{

	public function index(){
		utils::isAdmin();
		$category = new category();
		$categories = $category->getAll();

		require_once 'views/categories/index.php';
	}

	public function show(){
		if(isset($_GET['id'])){
			
			$id = $_GET['id'];
			
			// GET CATEGORY
			$category = new Category();
			$category->setId($id);
			$category = $category->getOne();

			// GET PRODUCTS
			$product = new Product();
			$product->setCategory_id($id);

			$products = $product->getAllByCategory();
		}

		require_once 'views/categories/show.php';
	}
	public function create(){
		utils::isAdmin();
		require_once 'views/categories/create.php';
	}

	public function save(){
		utils::isAdmin();

		if(isset($_POST) && isset($_POST['name'])){
			// SAVE CATEGORY IN DB
			$category = new Category();
			$category->setName($_POST['name']);
			$save = $category->save();
		}
		die();
		header("Location:".base_url."category/index");
	}
}