<?php

use \Icomp\PageAdmin;
use \Icomp\Model\User;
use \Icomp\Model\Device;
$app->get('/admin/devices',function(){

	$user = User::verifyLogin();

	$devices = Device::listAll();

	$page = new PageAdmin(["data"=>[
		"user"=>$user
	]]);

	$page->setTpl("devices",[
		"devices"=>$devices
	]);

});

$app->get('/admin/devices/create',function(){

	$user = User::verifyLogin();

	$page = new PageAdmin(["data"=>[
		"user"=>$user
	]]);

	$page->setTpl("devices-create");
});

$app->post('/admin/devices/create',function(){

	User::verifyLogin();

	$device = new Device();

	$device->setData($_POST);

	$device->save();

	header("Location: /admin/devices");
	exit;
});

$app->get('/admin/devices/{iddevice}',function($req,$res,$args){
	$user = User::verifyLogin();
	
	$iddevice = (int)$args['iddevice'];

	$page = new PageAdmin(["data"=>[
		"user"=>$user
	]]);

	$device = new Device();
	$device->get($iddevice);

	$page->setTpl("devices-update",[
		"device"=>$device->getValues()
	]);
	
});

$app->post('/admin/devices/{iddevice}',function($req,$res,$args){
	User::verifyLogin();

	$iddevice = (int)$args['iddevice'];

	$device = new Device();
	$device->setid($iddevice);
	$device->setData($_POST);
	$device->update();

	header("Location: /admin/devices");
	exit;
});

$app->get('/admin/devices/{iddevice}/delete',function($req,$res,$args){
	$user = User::verifyLogin();

	$iddevice = (int)$args['iddevice'];
	
	$device = new Device();

	$device->delete($iddevice);

	header("Location: /admin/devices");
	exit;

});


?>