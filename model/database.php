<?php
class database {
	private $conn;
	public function  __construct(){
		
	}
	
	/*
	 * Method for connect with database
	 */
	public function db_connect(){
		include_once dirname(__FILE__) . "/config.php";
		$this->conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_TABLE, DB_USER, DB_PASSWORD);
		if(!$this->conn){
			echo "Erro ao conectar com a Base da Dados";
		}
		return $this->conn;
	}
	/*
	public function bind_placeholder_vars(&$stmt,$params,$debug=0) {
		// Credit to: Dave Morgan
		// Code ripped from: http://www.devmorgan.com/blog/2009/03/27/dydl-part-3-dynamic-binding-with-mysqli-php/
		if ($params != null) {
			$types = '';                        //initial sting with types
			foreach ($params as $param) {        //for each element, determine type and add
				if (is_int($param)) {
					$types .= 'i';              //integer
				} elseif (is_float($param)) {
					$types .= 'd';              //double
				} elseif (is_string($param)) {
					$types .= 's';              //string
				} else {
					$types .= 'b';              //blob and unknown
				}
			}
	
			$bind_names = array();
			$bind_names[] = $types;             //first param needed is the type string
			// eg:  'issss'
	
					for ($i=0; $i<count($params);$i++) {    //go through incoming params and added em to array
						$bind_name = 'bind' . $i;       //give them an arbitrary name
						$$bind_name = $params[$i];      //add the parameter to the variable variable
						$bind_names[] = &$$bind_name;   //now associate the variable as an element in an array
					}
	
					if ($debug) {
						echo "\$bind_names:<br />\n";
						var_dump($bind_names);
						echo "<br />\n";
					}
					//error_log("better_mysqli has params ".print_r($bind_names, 1));
					//call the function bind_param with dynamic params
					call_user_func_array(array($stmt,'bind_param'),$bind_names);
					return true;
		}else{
			return false;
		}
	}
	
	
	
	public function bind_result_array($stmt, &$row) {
		// Credit to: Dave Morgan
		// Code ripped from: http://www.devmorgan.com/blog/2009/03/27/dydl-part-3-dynamic-binding-with-mysqli-php/
		$meta = $stmt->result_metadata();
		while ($field = $meta->fetch_field()) {
			$params[] = &$row[$field->name];
		}
		call_user_func_array(array($stmt, 'bind_result'), $params);
		return true;
	}
	
}*/