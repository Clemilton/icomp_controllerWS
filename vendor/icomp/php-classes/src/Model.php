<?php
//Classe para ajudar nos getters and setters
namespace Icomp;


class Model {
	//Armazena os atributos vindos do bd
	private $values = [];
	//Metodo magico. Todas as funcoes da classe Model chamam a _call
	public function __call($name,$args){
		$method = substr($name, 0,3);
		$field = substr($name, 3,strlen($name));
		
		switch ($method) {
			//Caso o tenha 'get' no nome da funcao
			case 'get':
				return (isset($this->values[$field]))?$this->values[$field]:NULL;
				break;
			//Caso tenho 'set' no nome da funcao
			case 'set':
				$this->values[$field]=$args[0];
				break;
		}
	}
	public function setData($data = array()){
		//Seta os dados vindos do array $data dentro do $values
		foreach ($data as $key => $value) {
			//isso ira chamar a funcao __call. Metodos SET
			$this->{"set".$key}($value);
		}
	}
		//retorna $values
	public function getValues(){
		return $this->values;
	}
}
?>