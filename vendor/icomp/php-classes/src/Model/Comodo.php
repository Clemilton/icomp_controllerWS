<?php

namespace Icomp\Model;

use \Icomp\Model;
use \Icomp\DB\Sql;

class Comodo extends Model{


	public static function listAll($idplace){

		$sql = new Sql();

		return $sql->select("SELECT * FROM comodos a WHERE id_places=:idplace ORDER BY a.name",[
			":idplace"=>$idplace
		]);

	}

	public function save(){

		$sql = new Sql();

		$sql->query("INSERT INTO comodos (name,id_places)
					 VALUES (:name,:id_places)",[
			":name"=>$this->getname(),
			":id_places"=>(int)$this->getid_places()
		]);
	}

	public function get($idcomodo){
		$sql = new Sql();

		$results = $sql->select("SELECT * from comodos a WHERE a.id=:idcomodo",[
			":idcomodo"=>$idcomodo
		]);

		$this->setData($results[0]);
	}

	public function update(){
		$sql = new Sql();

		$sql->query("
			UPDATE comodos
			SET name=:name, id_places=:id_places
			WHERE id=:id",[
		":name"=>$this->getname(),
		":id_places"=>$this->getid_places(),
		":id"=>$this->getid()
		]);
	}

	public function delete($id)
	{

		$sql = new Sql();

		$sql->query("DELETE FROM comodos  WHERE id=:id;",[
			":id"=>$id
		]);

	}

	public static function getComodosFromPlace($idplace){
		$sql = new Sql();
		return $sql->select("SELECT * from comodos WHERE id_places=:idplace",[
			":idplace"=>$idplace
		]);
	}

	public static function getNameFromId($id){
		$sql = new Sql();
		$results = $sql->select("SELECT a.name FROM comodos a WHERE a.id=:id",[
			":id"=>$id
		]);
		return $results[0]["name"];
	}
}



?>