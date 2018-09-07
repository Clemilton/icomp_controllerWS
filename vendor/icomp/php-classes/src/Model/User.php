<?php


namespace Icomp\Model;

use \Icomp\Model;
use \Icomp\DB\Sql;



class User extends Model{

	const SESSION = "User";
	const SESSION_ERROR = "UserError";
	const ERROR = "UserError";
	const SUCCESS = "UserSucesss";

	public static function listAll(){

		$sql = new Sql();

		return $sql->select("SELECT * FROM user a ORDER BY a.username");
	}

	public function save(){
		$sql = new Sql();

		$sql->query("INSERT INTO user (username,desname,typeUser,password_hash,email,dtregister,telefone)
					 VALUES(:username,:desname,:typeUser,:password_hash,:email,NOW(),:telefone)",[
			":username"=>$this->getusername(),
			":desname"=>$this->getdesname(),
			":typeUser"=>$this->gettypeUser(),
			":password_hash"=>$this->getpassword_hash(),
			":email"=>$this->getemail(),
			":telefone"=>$this->gettelefone()
		]);
	}

	public function get($iduser){
		
		$sql = new Sql();

		$results = $sql->select("SELECT * from user a WHERE a.id=:iduser",[
			":iduser"=>$iduser
		]);

		$this->setData($results[0]);
	}

	public function update(){

		$sql = new Sql();

		$sql->query("
			UPDATE user
			SET desname=:desname, username=:username, telefone=:telefone,typeUser=:typeUser
			WHERE id=:id",[
			":desname"=>$this->getdesname(),
			":username"=>$this->getusername(),
			":telefone"=>$this->gettelefone(),
			":typeUser"=>$this->gettypeUser(),
			":id"=>$this->getid()
		]);
	}


	public static function login($login,$password){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM user a where a.username=:login",[
			":login"=>$login
		]);
		if(count($results)==0){
			//throw new \Exception("Usuário inexistente ou senha inválida");
			User::setMsgError("Usuário inexistente ou senha inválida");
			header("Location: /admin/login");
			exit;

		}

		$data = $results[0];
		//verifica a senha

		if (password_verify($password,$data["password_hash"])===true){
			$user = new User();
			//Seta os dados do banco no atributo values (class Model)
			$user->setData($data);
			$_SESSION[User::SESSION] = $user->getValues();
			return $user;
		}
		else{
			User::setMsgError("Usuário inexistente ou senha inválida");
			header("Location: /admin/login");
			exit;
		}
	}

	public function delete($id)
	{

		$sql = new Sql();

		$sql->query("DELETE FROM user  WHERE id=:id;",[
			":id"=>$id
		]);

	}


	public static function getPasswordHash($password)
	{

		return password_hash($password, PASSWORD_DEFAULT, [
			'cost'=>12
		]);

	}

	public function setPassword($password)
	{

		$sql = new Sql();

		$sql->query("UPDATE user SET password_hash = :password_hash WHERE id = :id", array(
			":password_hash"=>$password,
			":id"=>$this->getid()
		));

	}

	public static function verifyLogin($inadmin= true) {
		
		if(!isset($_SESSION[User::SESSION])
			|| !(int)$_SESSION[User::SESSION]["id"] > 0
			|| !(bool) $_SESSION[User::SESSION]["typeUser"]=="admin")
		{
			header("Location: /admin/login");
			exit;
		}
	}
	public static function logout(){
		$_SESSION[User::SESSION]=NULL;
		
	}

	public static function getError()
	{
		$msg = (isset($_SESSION[User::ERROR]) && $_SESSION[User::ERROR]) ? $_SESSION[User::ERROR] : '';

		User::clearError();

		return $msg;

	}

	public static function setError($msg)
	{

		$_SESSION[User::ERROR] = $msg;

	}

	public static function clearError()
	{

		$_SESSION[User::ERROR] = NULL;

	}
	public static function getSuccess()
	{

		$msg = (isset($_SESSION[User::SUCCESS]) && $_SESSION[User::SUCCESS]) ? $_SESSION[User::SUCCESS] : '';

		User::clearSuccess();

		return $msg;

	}

	public static function setSuccess($msg)
	{

		$_SESSION[User::SUCCESS] = $msg;

	}

	public static function clearSuccess()
	{

		$_SESSION[User::SUCCESS] = NULL;

	}

}
?>