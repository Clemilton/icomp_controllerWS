<?php
use \Icomp\Model\User;
use \Icomp\DB\Sql;
use \Icomp\Model\Comodo;


$app->get("/api/getComodosPlace/{idPlace}",function($req,$res,$args){
	$idPlace = $args['idPlace'];

	User::verifyLogin();

	$sql = new Sql();

	$comodos = Comodo::getComodosFromPlace($idPlace);

	return json_encode($comodos);
});

//Retorna todos os devices
$app->get("/api/getDevices",function(){
	User::verifyLogin();

	$sql = new Sql();

	$devices = $sql->select("SELECT * FROM devices");

	return json_encode($devices);

});
//Retorna os comandos do Device(device_id)
$app->get("/api/getComandsDevice/{devices_id}",function($req,$res,$args){

	User::verifyLogin();

	$devices_id = (int)$args['devices_id'];
	$sql = new Sql();

	$comands = $sql->select("
		SELECT  a.id,a.name as comando, b.interface, b.name as nome
		FROM comands a 
		INNER JOIN devices AS b ON a.devices_id=b.id
		WHERE a.devices_id=:devices_id",[
		":devices_id"=>$devices_id
	]);


	

	return json_encode($comands);

});

//Retorna a Lista de protocolos infravermelhos
$app->get("/api/getIrProtocols",function($req,$res,$args){

	User::verifyLogin();

	$sql = new Sql();

	$protocols = $sql->select("SELECT * FROM irprotocols");

	return json_encode($protocols);

});


?>
