<?php
require_once 'model/user.php';

class userController {
	public $success = false;
	protected $error = false;
	protected $msg = null;
	protected $msgErr = null;
	
	public function add(){
		$user = new user();
		
		if($_POST){
			if($user->addUser($_POST['name'], $_POST['email'], $_POST['password'], $_POST['birthday'])){
				$this->success = true;
				$this->msg = "Usuário cadastrado com sucesso!";
			} else {
				$this->error = true;
				$this->msgErr = "Ocorreu um erro ao cadastrar! Por favor, tente novamente, ou entre em contato com nossa equipe!";
			}
		}
		$success = $this->success;
		$error = $this->error;
		$msg = $this->msg;
		$msgErr = $this->msgErr;
		$lastID = $user->getLastUserID() + 1;
		require_once 'view/user_add_view.php';
	}
	
	public function lister()
}