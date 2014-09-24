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
	public function lister(){
		$products = new products();
		$allProducts = $products->getAllProducts();
		$totalAmount = $products->totalAmount();
		$totalValue = $products->totalValue();
		
		$success = $this->success;
		$msg = $this->msg;
		require_once 'view/product_lister_view.php';
	}
	public function del(){
		$id = $_GET ['id'];
		$products = new products();
		if ($products->removeProduct ( $id )) {
			$this->success = true;
			$this->msg = "Usuário removido com sucesso!";
		} else {
			$this->success = false;
			$this->msg = "Ocorreu um erro ao tentar excluir o usuário! Por favor, tente novamente...";
		}
		$this->lister ();
	}
	public function search(){
		$query = $_POST['query'];
		$products = new products();
		if ($products->getProductsSearch($query) != null){
			$allProducts = $products->getProductsSearch($query);
			$totalAmount = $products->totalAmount();
			$totalValue = $products->totalValue();
			$this->success = true;
		$this->msg = "A pesquisa obteve sucesso! Mostrando resultados para ".$query;
		} else {
			$this->success = false;
			$this->msg = "A sua pesquisa não obteve nenhum resultado. Mostrando todos os produtos:";
			$products = new products();
			$allProducts = $products->getAllProducts();
			$totalAmount = $products->totalAmount();
			$totalValue = $products->totalValue();
			
		}
		$success = $this->success;
		$msg = $this->msg;
		
		require_once 'view/product_lister_view.php';
	}
	public function edit(){
		$products = new products();
		$idr = $_GET['id'];
		if($_POST){
			if($products->editProduct($_POST['keyP'], $_POST['name'], $_POST['amount'], $_POST['value'], $_POST['id'])){
				$this->success =true;
				$this->msg = "Produto editado com sucesso!";
			} else {
				$this->success = false;
				$this->msg = "Erro ao editar o produto, por favor, tente novamente mais tarde!";
			}
		}
		$data = $products->getProduct($idr);
		$name = $data->name;
		$amount = $data->amount;
		$value = $data->value;
		$id = $data->id;
		$keyP = $data->keyP;
		$success = $this->success;
		$msg = $this->msg;
		
		
		require_once 'view/product_edit_view.php';
		
	}
}