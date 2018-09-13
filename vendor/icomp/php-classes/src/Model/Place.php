<?php


namespace Icomp\Model;

use \Icomp\Model;
use \Icomp\DB\Sql;



class Place extends Model{



	public static function listAll(){

		$sql = new Sql();

		return $sql->select("SELECT * FROM places a ORDER BY a.name");
	}

	public function save(){

		$sql = new Sql();

		$sql->query("INSERT INTO places (name,floor,endereco,bairro,nick_mqtt)
					 VALUES (:name,:floor,:endereco,:bairro,:nick_mqtt)",[
			":name"=>$this->getname(),
			":floor"=>(int)$this->getfloor(),
			":endereco"=>$this->getendereco(),
			":bairro"=>$this->getbairro(),
			":nick_mqtt"=>$this->getnick_mqtt()
		]);
	}

	public function get($idplace){

		$sql = new Sql();

		$results = $sql->select("SELECT * from places a WHERE a.id=:idplace",[
			":idplace"=>$idplace
		]);

		$this->setData($results[0]);
	}

	public function update(){

		$sql = new Sql();

		$sql->query("
			UPDATE places
			SET name=:name, floor=:floor, endereco=:endereco,bairro=:bairro,nick_mqtt=:nick_mqtt
			WHERE id=:id",[
			":name"=>$this->getname(),
			":floor"=>(int)$this->getfloor(),
			":endereco"=>$this->getendereco(),
			":bairro"=>$this->getbairro(),
			":nick_mqtt"=>$this->getnick_mqtt(),
			":id"=>$this->getid()
		]);
	}

	public function delete($id)
	{

		$sql = new Sql();

		$sql->query("DELETE FROM places  WHERE id=:id;",[
			":id"=>$id
		]);	

	}

	public static function getNameFromId($id){
		$sql = new Sql();
		$results = $sql->select("SELECT a.name FROM places a WHERE a.id=:id",[
			":id"=>$id
		]);
		return $results[0]["name"];
	}
}
?>