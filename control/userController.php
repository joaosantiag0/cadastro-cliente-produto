<?php
require_once 'model/user.php';
class userController {
	protected $success = false;
	protected $error = false;
	protected $msg = null;
	protected $msgErr = null;
	public function add() {
		$user = new user ();
		
		if ($_POST) {
			if ($user->addUser ( $_POST ['name'], $_POST ['email'], $_POST ['password'], $_POST ['birthday'], $_POST ['id'] )) {
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
		$lastID = $user->getLastUserID () + 1;
		require_once 'view/user_add_view.php';
	}
	public function lister() {
		$user = new user ();
		$allUsers = $user->getAllUsers ();
		
		$success = $this->success;
		$msg = $this->msg;
		$error = $this->error;
		$msgErr = $this->msgErr;
		require_once 'view/user_lister_view.php';
	}
	public function del() {
		$id = $_GET ['id'];
		$user = new user ();
		if ($user->removeUser ( $id )) {
			$this->success = true;
			$this->msg = "Usuário removido com sucesso!";
		} else {
			$this->error = true;
			$this->msgErr = "Ocorreu um erro ao tentar excluir o usuário! Por favor, tente novamente...";
		}
		$this->lister ();
	}
	public function edit() {
		$id = $_GET ['id'];
		$user = new user ();		
		if ($_POST) {
			if ($user->editUser ( $_POST ['keyP'], $_POST ['name'], $_POST ['email'], $_POST ['password'], $_POST ['birthday'], $_POST ['id'] )) {
				$this->success = true;
				$this->msg = "Usuário editado com sucesso!";
			} else {
				$this->error = true;
				$this->msgErr = "Ocorreu um erro ao editar! Por favor, tente novamente, ou entre em contato com nossa equipe!";
			}
		}
		
		

		$userData = $user->getUsers ( $id );
		$keyP = $id;
		$name = $userData->name;
		$email = $userData->email;
		$id = $userData->id;
		$birthday = $userData->birthday;
		
		$success = $this->success;
		$msg = $this->msg;
		$error = $this->error;
		$msgErr = $this->msgErr;
		require_once 'view/user_edit_view.php';
	}
}