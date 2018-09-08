<?php

namespace Icomp\Model;

use \Icomp\Model;
use \Icomp\DB\Sql;

class Device extends Model{

	public static function listAll(){
		$sql = new Sql();

		return $sql->select("SELECT * FROM devices");
	}

	public function save(){
		$sql = new Sql();
		$sql->query("
			INSERT INTO devices (name,mark,model,interface)
			VALUES (:name,:mark,:model,:interface);
		",[
			":name"=>$this->getname(),
			":mark"=>$this->getmark(),
			":model"=>$this->getmodel(),
			":interface"=>$this->getinterface()
		]);
	}

	public function get($iddevice){
		$sql = new Sql();

		$results = $sql->select("SELECT * from devices WHERE id=:iddevice",[
			":iddevice"=>$iddevice
		]);
		$this->setData($results[0]);

	}

	public function update(){

		$sql = new Sql();

		$sql->query("
			UPDATE devices
			SET name=:name,mark=:mark, model=:model
			WHERE id=:id",[
			":name"=>$this->getname(),
			":mark"=>$this->getmark(),
			":model"=>$this->getmodel(),
			":id"=>$this->getid()
		]);
	}

	public function delete($id){

		$sql = new Sql();
		$sql->query("
			DELETE FROM devices
			WHERE id=:id
		",[
			":id"=>$id
		]);
	}

}


?>