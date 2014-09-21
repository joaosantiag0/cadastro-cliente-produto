<?php
class database {
	private $conn;
	public function  __construct(){
		
	}
	
	/*
	 * Method for connect with database
	 */
	public function db_connect(){
		include_once dirname(__FILE__) . "./config.php";
		$this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
		if(mysqli_connect_errno()){
			echo "Erro ao conectar com a Base da Dados";
		}
		return $this->conn;
	}
}