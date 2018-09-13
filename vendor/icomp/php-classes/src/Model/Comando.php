<?php

namespace Icomp\Model;

use \Icomp\Model;
use \Icomp\DB\Sql;

class Comando extends Model{

	public static function listAll($iddevice){
		$sql = new Sql();

		return $sql->select("SELECT * FROM comands WHERE devices_id=:iddevice",[
			":iddevice"=>$iddevice
		]);
	}

	public function save(){
		$sql = new Sql();
		if($this->gettype()=='ircode'){
			$sql->query("

				CALL sp_insert_command_ir(:name,:type,:devices_id,:value,:protocol,:bits)",[
				":name"=>$this->getname(),
				":type"=>$this->gettype(),
				":devices_id"=>(int)$this->getdevices_id(),
				":value"=>$this->getvalue(),
				":protocol"=>$this->getprotocol(),
				":bits"=>(int)$this->getbits()
			]);
		}
	}

	public function get($idcomando){
		$sql = new Sql();

		$comand = $sql->select("

			SELECT * from comands where id=:id
			",[":id"=>$idcomando]);
		$comand = $comand[0];

		if($comand["type"]=='ircode'){
			$ircomand = $sql->select("
				SELECT * from ircomands WHERE comands_id=:comands_id",[
				":comands_id"=>(int)$comand["id"]
			]);
			$ircomand = $ircomand[0];
			$ircomand["id_ircomand"]=$ircomand["id"];
			$comand = array_merge($ircomand,$comand);
			
		}



		$this->setData($comand);

	}

	public function update(){

		$sql = new Sql();

		$sql->query("
			UPDATE comands
			SET name=:name
			WHERE id=:id",[
			":name"=>$this->getname(),
			":id"=>$this->getid()
		]);

		if($this->gettype()=='ircode'){
			$sql->query("
				UPDATE ircomands
				SET value=:value,protocol=:protocol,bits=:bits
				WHERE 
			");
		}
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