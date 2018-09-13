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

$app->get("/api/getDevices",function(){
	User::verifyLogin();

	$sql = new Sql();

	$devices = $sql->select("SELECT * FROM devices");

	return json_encode($devices);

});

$app->get("/api/getComandsDevice/{devices_id}",function($req,$res,$args){

	User::verifyLogin();

	$devices_id = (int)$args['devices_id'];
	$sql = new Sql();

	$comands = $sql->select("
		SELECT  a.id,a.name as comando, a.type, b.name as nome
		FROM comands a 
		INNER JOIN devices AS b ON a.devices_id=b.id
		WHERE a.devices_id=:devices_id",[
		":devices_id"=>$devices_id
	]);


	

	return json_encode($comands);

});


?>
