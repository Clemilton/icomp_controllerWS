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
			INSERT INTO devices (name,mark,model,interface,nick_mqtt)
			VALUES (:name,:mark,:model,:interface,:nick_mqtt);
		",[
			":name"=>$this->getname(),
			":mark"=>$this->getmark(),
			":model"=>$this->getmodel(),
			":nick_mqtt"=>$this->getnick_mqtt(),
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
		$code=0;
		try{
			$sql->query("
				UPDATE devices
				SET name=:name,mark=:mark, model=:model,nick_mqtt=:nick_mqtt
				WHERE id=:id",[
				":name"=>$this->getname(),
				":mark"=>$this->getmark(),
				":model"=>$this->getmodel(),
				":nick_mqtt"=>$this->getnick_mqtt(),
				":id"=>$this->getid()
			]);
		}catch(\PDOException $Exception ){
			
			return (int)$Exception->getCode();


		}
		return $code;
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