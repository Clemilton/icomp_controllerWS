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

		$sql->query("INSERT INTO places (name,floor,endereco,bairro)
					 VALUES (:name,:floor,:endereco,:bairro)",[
			":name"=>$this->getname(),
			":floor"=>(int)$this->getfloor(),
			":endereco"=>$this->getendereco(),
			":bairro"=>$this->getbairro()
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
			SET name=:name, floor=:floor, endereco=:endereco,bairro=:bairro
			WHERE id=:id",[
			":name"=>$this->getname(),
			":floor"=>(int)$this->getfloor(),
			":endereco"=>$this->getendereco(),
			":bairro"=>$this->getbairro(),
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
}
?>