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

		$sql->query("INSERT INTO comodos (name,id_places,nick_mqtt)
					 VALUES (:name,:id_places,:nick_mqtt)",[
			":name"=>$this->getname(),
			":id_places"=>(int)$this->getid_places(),
			":nick_mqtt"=>$this->getnick_mqtt()
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
			SET name=:name, id_places=:id_places,nick_mqtt=:nick_mqtt
			WHERE id=:id",[
		":name"=>$this->getname(),
		":id_places"=>$this->getid_places(),
		":nick_mqtt"=>$this->getnick_mqtt(),
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

	public function getDevices($related= true){

		$sql = new Sql();

		if($related == true){
			//Retorna todos os lugares que estao relacionados com a categoria
			return $sql->select("
				SELECT *
				FROM devices
				WHERE devices.id IN(
					SELECT devices_id
					FROM comodos_device
					WHERE comodos_id=:id_comodo
				);",[
				":id_comodo"=>$this->getid()
			]);
		}else{
			//Retona todos os produtos que NAO estao relacionados com a categoria
			return $sql->select("
				SELECT *
				FROM devices
				WHERE devices.id NOT IN(
					SELECT devices_id
					FROM comodos_device
					WHERE comodos_id=:id_comodo
				);",[
				":id_comodo"=>$this->getid()
			]);
		}
	}

	public function addDevice($iddevice){
	
		$sql = new Sql();
		//Montando o topico a ser utilizado no MQTT
		$nickDevice = $sql->select("
			SELECT a.nick_mqtt FROM devices a WHERE id=:id",[
			":id"=>$iddevice]
		)[0]["nick_mqtt"];

		$comodo = $sql->select("
			SELECT * FROM comodos a WHERE id=:id",[
			":id"=>$this->getid()
		])[0];
		$nickComodo = $comodo["nick_mqtt"];
		$id_place = $comodo["id_places"];

		$nickPlace = $sql->select("
			SELECT a.nick_mqtt FROM places a WHERE id=:id",[
			":id"=>$id_place
		])[0]["nick_mqtt"];

		$topic = "/".$nickPlace."/".$nickComodo."/".$nickDevice;
		
		$sql->query("
			INSERT INTO comodos_device (devices_id,comodos_id,topic)
			VALUES (:devices_id,:comodos_id,:topic);
		",[
			":devices_id"=>(int)$iddevice,
			":comodos_id"=>(int)$this->getid(),
			":topic"=>$topic
		]);
	}
	public function removeDevice($iddevice){
		$sql = new Sql();
		$sql->query("
			DELETE FROM comodos_device
			WHERE devices_id=:devices_id and comodos_id=:comodos_id;
		",[
			":devices_id"=>$iddevice,
			":comodos_id"=>$this->getid()
		]);
	}
}



?>