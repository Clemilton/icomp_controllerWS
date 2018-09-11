<?php

use \Icomp\PageAdmin;
use \Icomp\Model\Place;
use \Icomp\Model\User;
use \Icomp\Model\Comodo;

$app->get("/admin/places/{idplace}/comodos",function($req,$res,$args){

	$user = User::verifyLogin();

	$idplace = $args['idplace'];

	$comodos = Comodo::listAll($idplace);

	$page  = new PageAdmin($opts=["data"=>["user"=>$user]]
							,$tpl_dir="/views/admin/comodos/");

	$place = new Place();
	$place->get((int)$idplace);

	$page->setTpl("comodos",[
		'place'=>$place->getValues(),
		'comodos'=>$comodos
	]);

});

$app->get("/admin/places/{idplace}/comodos/create",function($req,$res,$args){

	$user = User::verifyLogin();

	$idplace = $args['idplace'];

	$place = new Place();

	$place->get((int)$idplace);

	$page  = new PageAdmin($opts=["data"=>["user"=>$user]]
							,$tpl_dir="/views/admin/comodos/");

	$page->setTpl("comodos-create",[
		"place"=>$place->getValues()
	]);

});

$app->post("/admin/places/{idplace}/comodos/create",function($req,$res,$args){

	$user = User::verifyLogin();

	$idplace = $args['idplace'];

	$comodo = new Comodo();

	$comodo->setid_places((int)$idplace);

	$comodo->setData($_POST);

	$comodo->save();
	
	header("Location: /admin/places/".$idplace."/comodos");
	exit;
});

$app->get("/admin/places/{idplace}/comodos/{idcomodo}",function($req,$res,$args){

	$user = User::verifyLogin();
	$idplace = $args['idplace'];
	$idcomodo = $args['idcomodo'];

	$comodo = new Comodo();
	$comodo->get((int)$idcomodo);
	$place = new Place();
	$place->get((int)$idplace);

	$page  = new PageAdmin($opts=["data"=>["user"=>$user]]
							,$tpl_dir="/views/admin/comodos/");

	$page->setTpl("comodos-update",[
		"place"=>$place->getValues(),
		"comodo"=>$comodo->getValues()
	]);

});

$app->post("/admin/places/{idplace}/comodos/{idcomodo}",function($req,$res,$args){

	User::verifyLogin();
	
	$comodo = new Comodo();
	$comodo->setid_places((int)$args['idplace']);
	$comodo->setData($_POST);
	$comodo->setid((int)$args['idcomodo']);

	$comodo->update();

	header("Location: /admin/places/".$args['idplace']."/comodos");
	exit;

});

$app->get("/admin/places/{idplace}/comodos/{idcomodo}/delete",function($req,$res,$args){

	User::verifyLogin();
	$idplace=$args['idplace'];

	$comodo = new Comodo();
	$comodo->get((int)$idcomodo);

	$comodo->delete((int)$args['idcomodo']);

	header("Location: /admin/places/".$idplace."/comodos");
	exit;

});

$app->get("/admin/places/{idplace}/comodos/{idcomodo}/devices",function($req,$res,$args){

	$user=User::verifyLogin();
	$idcomodo = $args['idcomodo'];
	$idplace = $args['idplace'];

	$comodo = new Comodo();
	$comodo->get((int)$idcomodo);
	$comodo->setid((int)$idcomodo);

	$page  = new PageAdmin($opts=["data"=>["user"=>$user]]
							,$tpl_dir="/views/admin/comodos/");


	$page->setTpl("comodos-device",[
		"comodo"=>$comodo->getValues(),
		"devicesRelated" => $comodo->getDevices(),
		"devicesNotRelated" => $comodo->getDevices(false),
		"idplace" => $idplace
	]);

});


$app->get("/admin/comodos/{idcomodo}/devices/{iddevice}/addDevice",function($req,$res,$args){

	$user=User::verifyLogin();
	$idcomodo = $args['idcomodo'];
	$iddevice = $args['iddevice'];

	$comodo = new Comodo();
	$comodo->get((int)$idcomodo);
	$comodo->setid((int)$idcomodo);

	$comodo->addDevice((int)$iddevice);

	header("Location: /admin/places/".$comodo->getid_places()."/comodos/".
			$idcomodo."/devices");
	exit;
});

$app->get("/admin/comodos/{idcomodo}/devices/{iddevice}/removeDevice",function($req,$res,$args){

	$user=User::verifyLogin();
	$idcomodo = $args['idcomodo'];
	$iddevice = $args['iddevice'];

	$comodo = new Comodo();
	$comodo->get((int)$idcomodo);
	$comodo->setid((int)$idcomodo);
	$comodo->removeDevice((int)$iddevice);

	header("Location: /admin/places/".$comodo->getid_places()."/comodos/".
			$idcomodo."/devices");
	exit;
});


?>