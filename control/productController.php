<?php
require_once 'model/products.php';

class productController{
	protected $success;
	protected $msg;
	public function add(){
		$products = new products();
		
		
		if($_POST){
			if($products->addProduct($_POST['name'], $_POST['amount'], $_POST['value'], $_POST['id'])){
				$this->success = true;
				$this->msg = "Produto cadastrado com sucesso!";
			} else {
				$this->success = false;
				$this->msg = "Erro ao efetuar o cadastro, por favor, tente novamente.";
			}
		}
		$lastID = $products->getLastProductID()+1;
		
		$success = $this->success; $msg = $this->msg;
		require_once 'view/product_add_view.php';
	}
}