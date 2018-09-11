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

?>
