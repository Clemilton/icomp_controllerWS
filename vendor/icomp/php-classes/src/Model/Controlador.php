<?php

namespace Icomp\Model;

use \Icomp\Model;
use \Icomp\DB\Sql;
use \Icomp\Model\Place;

class Controlador extends Model{

	public static function listAll(){
		$sql = new Sql();

		return $sql->select("SELECT * FROM controladores");
	}

	public function save(){
		$sql = new Sql();
		$sql->query("
			INSERT INTO controladores (name,ip_address,comodos_id,places_id)
			VALUES (:name,:ip_address,:comodos_id,:places_id);
		",[
			":name"=>$this->getname(),
			":ip_address"=>$this->getip_address(),
			":comodos_id"=>$this->getcomodos_id(),
			":places_id"=>$this->getplaces_id()
		]);
	}

	public function get($idcontrolador){
		$sql = new Sql();

		$results = $sql->select("SELECT * from controladores WHERE id=:idcontrolador",[
			":idcontrolador"=>$idcontrolador
		]);


		
		$this->setData($results[0]);
		
		$this->setname_place(Place::getNameFromId($this->getplaces_id()));
		$this->setname_comodo(Comodo::getNameFromId($this->getcomodos_id()));
		
	}

	public function update(){

		$sql = new Sql();

		$sql->query("
			UPDATE controladores
			SET name=:name,ip_address=:ip_address
			WHERE id=:id",[
			":name"=>$this->getname(),
			":ip_address"=>$this->getip_address(),
			":id"=>$this->getid()
		]);
	}

	public function delete($id){

		$sql = new Sql();
		$sql->query("
			DELETE FROM controladores
			WHERE id=:id
		",[
			":id"=>$id
		]);
	}
	//Adiciona a lista de controladores os nomes do lugar e comodo
	public static function addNames($controladores){

		for ($i=0 ; $i < count($controladores) ; $i++ ) {
			$controladores[$i]["name_lugar"]=Place::getNameFromId($controladores[$i]["places_id"]);

			$controladores[$i]["name_comodo"]=Comodo::getNameFromId($controladores[$i]["comodos_id"]);
			
		}
	
	
		return $controladores;
	}


}


?>