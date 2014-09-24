<?php
require_once 'model/products.php';
require_once 'model/user.php';
class indexController {
	public function index(){
		$user = new user();
		$product = new products();
		$totalUsers = $user->getUsersCount();
		$totalProducts = $product->getProductsCount();
		$lastUser = $user->getLastUser()->name;
		$product->getAllProducts();
		$lastProduct = $product->getLastProduct()->name;
		$totalProductsValue = $product->totalValue();
		$totalProductsAmount = $product->totalAmount();
		
		require_once 'view/index_view.php';
	}
}