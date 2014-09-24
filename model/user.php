<?php
class user {
	private $conn;
	public function __construct() {
		include_once dirname ( __FILE__ ) . "/database.php";
		$db = new database ();
		$this->conn = $db->db_connect ();
	}
	/*
	 * Function for add User @return Array user data storaged
	 */
	public function addUser($name, $email, $password, $birthday, $id = NULL) {
		if (! $this->hasEmpty ( array (
				$name,
				$email,
				$password,
				$birthday 
		) ) && filter_var ( $email, FILTER_VALIDATE_EMAIL )) {
			
			if ($id == null || $id == "") {
				$id = $this->getLastUserID () + 1;
				
				if ($id == null)
					$id = 0;
			}
			try {
				$db = $this->conn->prepare ( "INSERT INTO users(id,name,email,password,birthday) VALUES(:id,:name,:email,:password,:birthday)" );
				$pw = md5 ( $password );
				$bday = $this->date_formatter ( "us", $birthday );
				$db->bindParam ( ":id", $id );
				$db->bindParam ( ":name", $name );
				$db->bindParam ( ":email", $email );
				$db->bindParam ( ":password", $pw );
				$db->bindParam ( ":birthday", $bday );
				if ($db->execute ()) {
					$db = null;
					return true;
				}
			} catch ( PDOException $e ) {
				echo $e->getMessage ();
			}
			$db = null;
			return false;
		}
	}
	
	/*
	 * Function to Edit a user @return Array of user data
	 */
	public function editUser($keyP, $name, $email, $password, $birthday, $id) {
		try {
			$db = $this->conn->prepare ( "UPDATE users SET id=:id, name=:name, email=:email, password=:password, birthday=:birthday where keyP=:keyP" );
			$bday = $this->date_formatter("us", $birthday);
			$pw = md5($password);
			$db->bindParam ( ":id", $id );
			$db->bindParam ( ":name", $name );
			$db->bindParam ( ":email", $email );
			$db->bindParam ( ":password", $pw );
			$db->bindParam ( ":birthday", $bday );
			$db->bindParam ( ":keyP", $keyP );
			if ($db->execute ()) {
				$db = null;
				return true;
			}
		} catch ( PDOException $e ) {
			echo $e->getMessage ();
		}
		$db = null;
		return false;
	}
	
	/*
	 * Function for get User data. @return Array with user data
	 */
	public function getUsers($id) {
		$db = $this->conn->prepare ( "SELECT id, name, email, password, birthday, keyP FROM users WHERE keyP=:id" );
		$db->bindParam ( ":id", $id );
		try {
			if ($db->execute ()) {
				$result = $db->fetch ( PDO::FETCH_OBJ );
			}
		} catch ( PDOException $e ) {
			echo $e->getMessage ();
		}
		$result->birthday = $this->date_formatter("br", $result->birthday);
		$db = null;
		return $result;
	}
	/*
	 * Function for get All Users in Database @return Array with all users data
	 */
	public function getAllUsers() {
		$db = $this->conn->prepare ( "SELECT id, name, email, password, birthday, keyP FROM users WHERE 1 ORDER BY keyP DESC" );
		try {
			if ($db->execute ()) {
				$result = $db->fetchAll ( PDO::FETCH_OBJ );
			}
		} catch ( PDOException $e ) {
			echo $e->getMessage ();
		}
		$db = null;
		foreach ( $result as $u ) {
			$u->birthday = $this->date_formatter ( "br", $u->birthday );
		}
		
		return $result;
	}
	/*
	 * Function to remove a user from database
	 */
	public function removeUser($id) {
		$db = $this->conn->prepare ( "DELETE FROM users WHERE keyP=:id" );
		$db->bindParam ( ":id", $id );
		try {
			if ($db->execute ())
				return true;
		} catch ( PDOException $e ) {
			echo $e->getMessage ();
		}
		return false;
	}
	/*
	 * Function to get how many users in database
	 */
	public function getUsersCount() {
		$result = 0;
		$db = $this->conn->query ( "SELECT count(*) from users WHERE 1" );
		$result = $db->fetchColumn ();
		return $result;
	}
	/*
	 * Function to get last user add
	 */
	public function getLastUser() {
		return $this->getUsers ( $this->getLastUserID () );
	}
	public function getLastUserID() {
		$db = $this->conn->prepare ( "SELECT keyP FROM users WHERE 1 ORDER BY keyP DESC LIMIT 1" );
		try {
			if ($db->execute ()){
				$fetch = $db->fetch ( PDO::FETCH_OBJ );
				 if(isset($fetch->keyP)){
				 	
				 	return $fetch->keyP;
				 } else {
				 	
				 	return 0;
				 }
			} else {
				print_r($db->errorInfo());
			}
		} catch ( PDOException $e ) {
			echo $e->getMessage ();
		}
		return null;
	}
	public function date_formatter($lang, $date) {
		
		if ($lang == "br") {
			$date = explode ( "-", $date );
			if(count($date) > 0)
			$date = $date [2] . "/" . $date [1] . "/" . $date [0];
			
			if($date != "//")
				return $date; 
		} else {
			$date = explode ( "/", $date );
			return $date [2] . "-" . $date [1] . "-" . $date [0];
		}
	}
	private function hasEmpty($fields) {
		foreach ( $fields as $f ) {
			if (empty ( $f )) {
				return true;
			}
		}
		return false;
	}
}