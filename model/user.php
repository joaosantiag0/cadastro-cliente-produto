<?php
class user {
	private $conn;
	public function __construct() {
		include_once dirname ( __FILE__ ) . "db.php";
		$db = new database ();
		$conn = $db->db_connect ();
	}
	public function addUser($name, $email, $password, $birthday, $id = NULL) {
		if (!$this->hasEmpty(array($name, $email, $password, $birthday))){
				if($id == null){
					$id = $this->getLastUserID();
					if($id == null){
						$id = 0;
					}
				}
			$db = $this->conn->prepare("INSERT INTO users(id, name, email, password, birthday) VALUES(?,?,?,?,?)");
			$db->bind_param("issss", $id, $name, $email, $password, $birthday);
			if($db->execute()){
				$result = $db->get_result()->fetch_assoc();
			}			
			$db->close();
			return $result;
		}
	}
	private function getLastUserID(){
		$db = $this->conn->prepare("SELECT key FROM users");
		if($db->execute()){
			return $db->insert_id;
		}	
		return null;
	}
	
	private function hasEmpty($fields) {
		$message = "";
		foreach ( $fields as $f ) {
			if(empty($f)){
				return true;
			}
		}
		return false;
	}
}